<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $genres = DB::table('genres')->get();
        $query = $request->get('q');
        $sort = $request->get('sort');

        $price1 = $request->get('price1');
        $price2 = $request->get('price2');


        $albums = DB::table('albums')
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->leftJoin('genres', 'albums.genre_id', '=', 'genres.genre_id')
            ->leftJoin('album_discounts', 'albums.album_id', '=', 'album_discounts.album_id')
            ->leftJoin('discounts', 'album_discounts.discount_id', '=', 'discounts.discount_id')
            ->select(
                'albums.*',
                'artists.artist_name',
                'genres.genre_name',
                'discounts.discount_value',
                'discounts.discount_type'
            );

        if ($query) {
            $albums = $albums->where(function ($qB) use ($query) {
                $qB->where('albums.album_name', 'like', '%' . $query . '%')
                    ->orWhere('artists.artist_name', 'like', '%' . $query . '%')
                    ->orWhere('genres.genre_name', 'like', '%' . $query . '%');
            });
        }

        if ($price1) {
            $albums = $albums->where('albums.price', '>=', $price1);
        }
        if ($price2) {
            $albums = $albums->where('albums.price', '<=', $price2);
        }

        $sort = $request->get('sort');
        // if ($sort == 'popular') {
        //     $albums->leftJoin('orderitems', 'albums.album_id', '=', 'orderitems.album_id')
        //         ->selectRaw('albums.*, COUNT(orderitems.order_item_id) as sold_count')
        //         ->groupBy('albums.album_id')
        //         ->orderByDesc('sold_count');
        // } else
        if ($sort == 'newest') {
            $albums = $albums->orderByDesc('albums.release_date');
        } elseif ($sort == 'price_asc') {
            $albums = $albums->orderBy('albums.price');
        } elseif ($sort == 'price_desc') {
            $albums = $albums->orderByDesc('albums.price');
        }
        // popular, rating: cần bổ sung trường nếu có

        $albums = $albums->paginate(8)->appends(['q' => $query, 'sort' => $sort]);

        return view('users.shop.index', compact('albums', 'sort', 'genres', 'query'));
    }
}
