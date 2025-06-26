<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $genres = DB::table('genres')->get();

        return view('users.cart.checkout', compact('genres'));
    }
}
