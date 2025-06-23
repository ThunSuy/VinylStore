<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShopController;
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


// Home page
Route::get('/', [HomeController::class, 'index']);
Route::get('/index', [HomeController::class, 'index']);

// Artists page
Route::get('/artists', [ArtistController::class, 'index'])->name('artists.index');
Route::get('/artists/{artist_name}', [ArtistController::class, 'show'])->name('artists.show');

// Genres page
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{slug}', [GenreController::class, 'show'])->name('genres.show');


// Products page
Route::get('/albums/{album_id}', [AlbumController::class, 'show'])->name('albums.show');


// Shop page
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');


// Login page
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/login', [LoginController::class, 'login']);
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);


// User account page
Route::get('/account/profile', [UserController::class, 'profile'])->name('account.profile');
Route::post('/account/profile', [UserController::class, 'updateProfile'])->name('profile.update');
