<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });



Route::get('/', [UserController::class, 'index']);
Route::get('/index', [UserController::class, 'index']);


Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist_name}', [ArtistController::class, 'show'])->name('artists.show');


Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
