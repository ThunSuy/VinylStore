<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $users = DB::table('users')->get();
        $genres = DB::table('genres')->get();

        $albums = DB::table('albums')
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->select(
                'albums.*',
                'artists.artist_name',
                DB::raw('LEFT(albums.description, 333) as description')
            )
            ->inRandomOrder()
            ->limit(3)
            ->get();

        $latestAlbums = DB::table('albums')
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->select('albums.*', 'artists.artist_name')
            ->orderByDesc('release_date')
            ->limit(4)
            ->get();

        $bestSeller = DB::table('orderitems')
            ->join('orders', 'orderitems.order_id', '=', 'orders.order_id')
            ->join('albums', 'orderitems.album_id', '=', 'albums.album_id')
            ->join('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->where('orders.order_status', 'completed')
            ->select(
                'albums.album_id',
                'albums.album_name',
                'albums.cover_image_url',
                'albums.price',
                'albums.release_date',
                'albums.description',
                'albums.artist_id',
                'artists.artist_name',
                DB::raw('SUM(orderitems.quantity) as total_sold')
            )
            ->groupBy(
                'albums.album_id',
                'albums.album_name',
                'albums.cover_image_url',
                'albums.price',
                'albums.release_date',
                'albums.description',
                'albums.artist_id',
                'artists.artist_name'
            )
            ->orderByDesc('total_sold')
            ->first();

        $featuredGenres = DB::table('genres')
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('users.home', compact('users', 'genres', 'albums', 'bestSeller', 'featuredGenres', 'latestAlbums'));
    }
}
