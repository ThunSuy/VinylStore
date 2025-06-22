<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $genres = DB::table('genres')->get();

        $albums = DB::table('albums')
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->leftJoin('album_discounts', 'albums.album_id', '=', 'album_discounts.album_id')
            ->leftJoin('discounts', 'album_discounts.discount_id', '=', 'discounts.discount_id')
            ->select('albums.*', 'artists.artist_name', 'discounts.discount_value', 'discounts.discount_type');

        $sort = $request->get('sort');
        if ($sort == 'newest') {
            $albums = $albums->orderByDesc('albums.album_id');
        } elseif ($sort == 'price_asc') {
            $albums = $albums->orderBy('albums.price');
        } elseif ($sort == 'price_desc') {
            $albums = $albums->orderByDesc('albums.price');
        }
        // popular, rating: cần bổ sung trường nếu có

        $albums = $albums->paginate(8);

        return view('users.shop.index', compact('albums', 'sort', 'genres'));
    }
}
