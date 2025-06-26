<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    public function index(Request $request)
    {
        $genres = DB::table('genres')->get();
        $cart = [];

        if (auth()->check()) {
            $cart = DB::table('cart')
                ->join('albums', 'cart.album_id', '=', 'albums.album_id')
                ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
                ->select(
                    'cart.album_id',
                    'albums.album_name',
                    'albums.price',
                    'albums.cover_image_url',
                    'cart.quantity as qty',
                    'artists.artist_name'
                )
                ->where('cart.user_id', auth()->user()->user_id)
                ->get()
                ->toArray();
        } else {
            if ($request->cookie('cart') !== null) {
                $cartRaw = urldecode($request->cookie('cart'));
                $cart = json_decode($cartRaw, true);
                if (!is_array($cart)) {
                    $cart = [];
                }
            }
        }

        return view('users.cart.index', compact('cart', 'genres'));
    }


    public function delete($album_id)
    {
        DB::table('cart')
            ->where('user_id', auth()->user()->user_id)
            ->where('album_id', $album_id)
            ->delete();

        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng');
    }

    // public function index(Request $request)
    // {
    //     $genres = DB::table('genres')->get();
    //     $cart = [];

    //     if (!auth()->check() && $request->cookie('cart') !== null) {
    //         $cartRaw = $request->cookie('cart');
    //         $cart = json_decode($cartRaw, true);

    //         // Nếu lỗi JSON hoặc không phải mảng
    //         if (!is_array($cart)) {
    //             $cart = [];
    //         }
    //     }
    //     // dd([
    //     //     'exists_raw_cookie' => array_key_exists('cart', $_COOKIE), // cookie thô
    //     //     'has_cookie' => $request->hasCookie('cart'), // Laravel kiểm tra thô
    //     //     'cookie_data' => $request->cookie('cart'), // Laravel đã giải mã
    //     // ]);


    //     return view('users.cart.index', compact('cart', 'genres'));
    // }
}
