<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtistController extends Controller
{
    public function index()
    {
        // $artists = DB::table('artists')
        //     ->leftJoin('albums', 'artists.artist_id', '=', 'albums.artist_id')
        //     ->select('artists.*', DB::raw('COUNT(albums.album_id) as product_count'))
        //     ->groupBy('artists.artist_id')
        //     ->get();
        $artists = DB::table('artists')
            ->leftJoin('albums', 'artists.artist_id', '=', 'albums.artist_id')
            ->select('artists.artist_id', 'artists.artist_name', 'artists.image_url', 'artists.description', DB::raw('COUNT(albums.album_id) as product_count'))
            ->groupBy('artists.artist_id', 'artists.artist_name', 'artists.image_url', 'artists.description')
            ->get();
        $genres = DB::table('genres')->get();

        return view('users.artists.index', compact('artists', 'genres'));
    }



    public function show($artist_name, Request $request)
    {
        $genres = DB::table('genres')->get();
        $artist = DB::table('artists')
            ->whereRaw('LOWER(artist_name) = ?', [strtolower($artist_name)])
            ->first();
        if (!$artist) abort(404);

        $description = $artist->description;


        $albumsQuery = DB::table('albums')
            ->where('artist_id', $artist->artist_id)
            ->leftJoin('album_discounts', 'albums.album_id', '=', 'album_discounts.album_id')
            ->leftJoin('discounts', 'album_discounts.discount_id', '=', 'discounts.discount_id')
            ->select('albums.*', 'discounts.discount_value', 'discounts.discount_type');

        if ($request->filled('price1')) {
            $albumsQuery->where('albums.price', '>=', $request->input('price1'));
        }
        if ($request->filled('price2')) {
            $albumsQuery->where('albums.price', '<=', $request->input('price2'));
        }

        $sort = $request->get('sort');
        if ($sort == 'newest') {
            $albumsQuery->orderByDesc('albums.release_date');
        } elseif ($sort == 'price_asc') {
            $albumsQuery->orderBy('albums.price');
        } elseif ($sort == 'price_desc') {
            $albumsQuery->orderByDesc('albums.price');
        }

        $albums = $albumsQuery->get();

        return view('users.artists.show', compact('artist', 'description', 'albums', 'sort', 'genres'));
    }
}
