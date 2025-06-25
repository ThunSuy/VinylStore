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

        if (!auth()->check() && $request->cookie('cart') !== null) {
            $cartRaw = $request->cookie('cart');
            $cart = json_decode($cartRaw, true);

            // Nếu lỗi JSON hoặc không phải mảng
            if (!is_array($cart)) {
                $cart = [];
            }
        }
        // dd([
        //     'exists_raw_cookie' => array_key_exists('cart', $_COOKIE), // cookie thô
        //     'has_cookie' => $request->hasCookie('cart'), // Laravel kiểm tra thô
        //     'cookie_data' => $request->cookie('cart'), // Laravel đã giải mã
        // ]);


        return view('users.cart.index', compact('cart', 'genres'));
    }
}
