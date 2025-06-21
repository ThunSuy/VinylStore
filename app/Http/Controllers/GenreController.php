<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{

    public function index()
    {

        $genres = DB::table('genres')
            ->leftJoin('albums', 'genres.genre_id', '=', 'albums.genre_id')
            ->select(
                'genres.genre_id',
                'genres.genre_name',
                'genres.slug',
                'genres.image_path',
                DB::raw('COUNT(albums.album_id) as product_count')
            )
            ->groupBy(
                'genres.genre_id',
                'genres.genre_name',
                'genres.slug',
                'genres.image_path'
            )
            ->get();

        // dd($genres);

        foreach ($genres as $g) {
            logger()->info('Genre:', (array) $g);
        }

        return view('users.genres.index', compact('genres'));
    }


    public function show($slug, Request $request)
    {
        $genres = DB::table('genres')->get();
        $genre = DB::table('genres')->where('slug', $slug)->first();
        if (!$genre) abort(404);

        // Lấy danh sách album theo genre
        $albums = DB::table('albums')
            ->where('genre_id', $genre->genre_id)
            ->leftJoin('artists', 'albums.artist_id', '=', 'artists.artist_id')
            ->leftJoin('album_discounts', 'albums.album_id', '=', 'album_discounts.album_id')
            ->leftJoin('discounts', 'album_discounts.discount_id', '=', 'discounts.discount_id')
            ->select('albums.*', 'artists.artist_name', 'discounts.discount_value', 'discounts.discount_type');
        //     ->get();
        // dd($albums);
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
        return view('users.genres.show', compact('genre', 'albums', 'sort', 'genres'));
    }
}
