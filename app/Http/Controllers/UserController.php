<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function profile()
    {
        $genres = DB::table('genres')->get();
        $user = auth()->user();
        return view('users.account.profile', compact('user', 'genres'));
    }



    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $changed = false;

        if ($user->full_name !== $request->input('full_name')) {
            $user->full_name = $request->input('full_name');
            $changed = true;
        }
        if ($user->phone !== $request->input('phone')) {
            $user->phone = $request->input('phone');
            $changed = true;
        }
        if ($user->address !== $request->input('address')) {
            $user->address = $request->input('address');
            $changed = true;
        }

        if ($request->hasFile('avatar')) {
            // Xoá avatar cũ nếu không phải ảnh Google
            if ($user->avatar_url && !str_contains($user->avatar_url, 'googleusercontent.com')) {
                $oldPath = str_replace('/storage/', '', $user->avatar_url); // Bỏ prefix để xóa đúng file
                Storage::disk('public')->delete($oldPath);
            }

            // Lưu ảnh mới
            $file = $request->file('avatar');
            $filename = 'avatar_' . $user->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/avatars', $filename, 'public'); // Lưu vào storage/app/public/images/avatars

            $user->avatar_url = '/storage/' . $path;
            $changed = true;
        }

        if ($changed) {
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        } else {
            return redirect()->back()->with('success', 'Không có thay đổi nào được thực hiện.');
        }
    }


    public function purchase()
    {
        $genres = DB::table('genres')->get();
        $user = Auth::user();

        $orders = DB::table('orders')
            ->where('user_id', $user->user_id)
            ->orderByDesc('order_date')
            ->get();

        $orderItems = DB::table('orderitems')
            ->join('albums', 'orderitems.album_id', '=', 'albums.album_id')
            ->get();

        return view('users.account.purchase', compact('user', 'genres', 'orders', 'orderItems'));
    }

    public function search(Request $request)
    {
        $genres = DB::table('genres')->get();
        $user = Auth::user();
        $keyword = $request->input('keyword');
        $userId = auth()->id();

        // Lọc theo ID đơn hàng (dạng OD00043)
        $ordersQuery = DB::table('orders')->where('user_id', $userId);

        if ($keyword) {
            // Kiểm tra nếu là mã ODxxxxx
            if (preg_match('/^OD(\d{5,})$/i', $keyword, $matches)) {
                $realId = intval($matches[1]);
                $ordersQuery->where('order_id', $realId);
            } else {
                // Tìm theo tên sản phẩm
                $ordersQuery->whereIn('order_id', function ($sub) use ($keyword) {
                    $sub->select('order_id')
                        ->from('orderitems')
                        ->join('albums', 'orderitems.album_id', '=', 'albums.album_id')
                        ->where('albums.album_name', 'like', '%' . $keyword . '%');
                });
            }
        }

        $orders = $ordersQuery->orderByDesc('order_id')->get();

        $orderItems = DB::table('orderitems')
            ->join('albums', 'orderitems.album_id', '=', 'albums.album_id')
            ->select('orderitems.*', 'albums.album_name', 'albums.cover_image_url')
            ->whereIn('order_id', $orders->pluck('order_id'))
            ->get();

        return view('users.account.purchase', compact('user', 'genres', 'orders', 'orderItems'));
    }

    public function showOrderDetail($id)
    {
        $genres = DB::table('genres')->get();
        $order = DB::table('orders')->where('order_id', $id)->first();
        $user = Auth::user();
        $orderItems = DB::table('orderitems')
            ->join('albums', 'orderitems.album_id', '=', 'albums.album_id')
            ->where('order_id', $id)
            ->select('orderitems.*', 'albums.album_name', 'albums.cover_image_url')
            ->get();

        $subtotal = $orderItems->sum(fn($item) => $item->unit_price);

        return view('users.account.detail-order', compact('order', 'user', 'orderItems', 'subtotal', 'genres'));
    }
}
