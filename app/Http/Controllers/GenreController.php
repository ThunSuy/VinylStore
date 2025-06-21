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
                'genres.image_path', // thêm các trường khác nếu có
                DB::raw('COUNT(albums.album_id) as product_count')
            )
            ->groupBy(
                'genres.genre_id',
                'genres.genre_name',
                'genres.slug',
                'genres.image_path' // thêm các trường khác nếu có
            )
            ->get();

        return view('users.genres.index', compact('genres'));
    }
}
