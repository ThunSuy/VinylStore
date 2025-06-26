<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


    public function add(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
        // Nếu đã có album này thì tăng qty, chưa có thì insert mới
        $cartItem = DB::table('cart')
            ->where('user_id', $user->user_id)
            ->where('album_id', $data['album_id'])
            ->first();

        if ($cartItem) {
            DB::table('cart')
                ->where('user_id', $user->user_id)
                ->where('album_id', $data['album_id'])
                ->update(['quantity' => $cartItem->quantity + $data['qty']]);
        } else {
            DB::table('cart')->insert([
                'user_id' => $user->user_id,
                'album_id' => $data['album_id'],
                'quantity' => $data['qty'],
                'added_at' => now(),
            ]);
        }
        return response()->json(['success' => true]);
    }

    public function ajaxUpdate(Request $request)
    {
        $userId = Auth::id();
        $albumId = $request->input('album_id');
        $type = $request->input('type'); // 'increase' or 'decrease'

        $cartItem = DB::table('cart')
            ->where('user_id', $userId)
            ->where('album_id', $albumId)
            ->first();

        if (!$cartItem) {
            return response()->json(['error' => 'Không tìm thấy sản phẩm'], 404);
        }

        if ($type === 'increase') {
            DB::table('cart')
                ->where('user_id', $userId)
                ->where('album_id', $albumId)
                ->increment('quantity');
        } elseif ($type === 'decrease') {
            if ($cartItem->quantity <= 1) {
                DB::table('cart')
                    ->where('user_id', $userId)
                    ->where('album_id', $albumId)
                    ->delete();
                return response()->json(['removed' => true]);
            } else {
                DB::table('cart')
                    ->where('user_id', $userId)
                    ->where('album_id', $albumId)
                    ->decrement('quantity');
            }
        }

        $newItem = DB::table('cart')
            ->where('user_id', $userId)
            ->where('album_id', $albumId)
            ->first();

        return response()->json([
            'success' => true,
            'new_qty' => $newItem->quantity ?? 0,
        ]);
    }
}
