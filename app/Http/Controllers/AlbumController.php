<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{

    public function show($album_id)
    {
        $genres = DB::table('genres')->get();
        $album = DB::table('albums')
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->leftJoin('genres', 'albums.genre_id', '=', 'genres.genre_id')
            ->leftJoin('album_discounts', 'albums.album_id', '=', 'album_discounts.album_id')
            ->leftJoin('discounts', 'album_discounts.discount_id', '=', 'discounts.discount_id')
            ->select(
                'albums.*',
                'artists.artist_name',
                'artists.artist_id',
                'genres.genre_name',
                'discounts.discount_value',
                'discounts.discount_type'
            )
            ->where('albums.album_id', $album_id)
            ->first();

        if (!$album) abort(404);

        // Sản phẩm tương tự: cùng thể loại, loại trừ album hiện tại
        $related = DB::table('albums')
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->leftJoin('album_discounts', 'albums.album_id', '=', 'album_discounts.album_id')
            ->leftJoin('discounts', 'album_discounts.discount_id', '=', 'discounts.discount_id')
            ->select(
                'albums.*',
                'artists.artist_name',
                'discounts.discount_value',
                'discounts.discount_type'
            )
            ->where('albums.genre_id', $album->genre_id)
            ->where('albums.album_id', '!=', $album_id)
            ->limit(4)
            ->get();

        return view('users.albums.show', compact('album', 'related', 'genres'));
    }
}
