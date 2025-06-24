<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index()
    {
        $genres = DB::table('genres')->get();

        // $albums = DB::table('albums')
        //     ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
        //     ->select(
        //         'albums.*',
        //         'artists.artist_name',
        //         DB::raw('LEFT(albums.description, 333) as description')
        //     )
        //     ->inRandomOrder()
        //     ->limit(3)
        //     ->get();

        return view('users.cart.index', compact('genres'));
    }
}
