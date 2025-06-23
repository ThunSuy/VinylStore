<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{


    public function showLoginForm()
    {
        $genres = DB::table('genres')->get();
        return view('users.login', compact('genres'));
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không đúng.',
        ])->withInput();
    }



    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        // Tìm hoặc tạo user
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if (!$user) {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'email' => $googleUser->getEmail(),
                'full_name' => $googleUser->getName(),
                'avatar_url' => $googleUser->getAvatar(),
                'password' => null,
            ]);
        } else {
            // Cập nhật google_id nếu chưa có
            if (!$user->google_id) {
                $user->google_id = $googleUser->getId();
                $user->save();
            }
        }
        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
