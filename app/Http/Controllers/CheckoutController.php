<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {
        $genres = DB::table('genres')->get();
        $user = auth()->user();
        $cart = DB::table('cart')
            ->join('albums', 'cart.album_id', '=', 'albums.album_id')
            ->where('cart.user_id', auth()->user()->user_id)
            ->select('cart.*', 'albums.album_name', 'albums.price', 'albums.cover_image_url')
            ->get();

        return view('users.cart.checkout', compact('genres', 'cart', 'user'));
    }



    public function submit(Request $request)
    {
        $user = auth()->user();

        // Validate dữ liệu
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'payment_method_id' => 'required|in:1,2', // VNPAY, COD
            'notes' => 'nullable|string',
        ]);

        // Lấy cart của user
        $cart = DB::table('cart')
            ->where('user_id', $user->user_id)
            ->join('albums', 'cart.album_id', '=', 'albums.album_id')
            ->select('cart.*', 'albums.price')
            ->get();

        if ($cart->isEmpty()) {
            return redirect('/cart')->with('error', 'Giỏ hàng trống.');
        }

        // Tính tổng đơn hàng
        $subtotal = $cart->sum(fn($item) => $item->price * $item->quantity);
        $shippingFee = $request->input('shipping_fee', 30000);
        $totalAmount = $subtotal + $shippingFee;

        // Tạo đơn hàng (bảng orders)
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $user->user_id,
            'order_date' => Carbon::now(),
            'shipping_address' => $request->shipping_address,
            'total_amount' => $totalAmount,
            'order_status' => 'pending',
            'payment_method_id' => $request->payment_method_id,
            'notes' => $request->notes,
            'shipping_fee' => $shippingFee,

        ]);


        // Thêm từng item vào bảng orderitems
        foreach ($cart as $item) {
            $unitPrice = $item->quantity * $item->price;
            DB::table('orderitems')->insert([
                'order_id' => $orderId,
                'album_id' => $item->album_id,
                'quantity' => $item->quantity,
                'unit_price' => $unitPrice,
            ]);
        }

        // Nếu chọn VNPAY, chuyển hướng sang cổng thanh toán
        if ($request->payment_method_id == 1) {

            $vnp_Url = config('services.vnpay.url');
            $vnp_Returnurl = config('services.vnpay.return_url');
            $vnp_TmnCode = config('services.vnpay.tmncode');
            $vnp_HashSecret = config('services.vnpay.hash_secret');

            $vnp_TxnRef = $orderId . '_' . time();
            $vnp_OrderInfo = 'Thanh-toan-don-hang';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = $totalAmount * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $request->ip();

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,

            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }

            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array(
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url
            );
            // if (isset($_POST['redirect'])) {
            //     header('Location: ' . $vnp_Url);
            //     die();
            // } else {
            //     echo json_encode($returnData);
            // }


            return redirect($vnp_Url);
        }


        // Xóa giỏ hàng
        DB::table('cart')->where('user_id', $user->user_id)->delete();

        // Điều hướng đến trang cảm ơn
        return redirect()->route('checkout.result')->with('success', 'Đặt hàng thành công!');
    }


    public function vnpayReturn(Request $request)
    {
        // Kiểm tra các tham số trả về từ VNPAY (vnp_ResponseCode, vnp_TxnRef, vnp_Amount, vnp_SecureHash, ...)
        // Xác thực chữ ký, cập nhật trạng thái đơn hàng, hiển thị thông báo thành công/thất bại cho user
        $orderId = explode('_', $request->vnp_TxnRef)[0];
        if ($request->vnp_ResponseCode == '00') {
            // Thành công
            // Cập nhật trạng thái đơn hàng...
            DB::table('orders')->where('order_id', $orderId)->update(['order_status' => 'paid']);
            $order = DB::table('orders')->where('order_id', $orderId)->first();
            if ($order) {
                DB::table('cart')->where('user_id', $order->user_id)->delete();
            }

            return redirect()->route('checkout.result')->with('success', 'Đặt hàng thành công!');
        } else {
            // Thất bại
            DB::table('orders')->where('order_id', $orderId)->update(['order_status' => 'cancelled']);
            return redirect()->route('checkout.result')->with('error', 'Đơn hàng đã bị hủy!');
        }
    }

    public function paymentResult()
    {
        $genres = DB::table('genres')->get();
        return view('users.cart.payment-result', compact('genres'));
    }
}
