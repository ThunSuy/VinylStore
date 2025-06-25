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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        $isFirstLogin = false;

        if (!$user) {
            $user = User::create([
                'google_id' => $googleUser->getId(),
                'email' => $googleUser->getEmail(),
                'full_name' => $googleUser->getName(),
                'avatar_url' => $googleUser->getAvatar(),
                'password' => null,
                'last_login' => now(),
            ]);
            $isFirstLogin = true;
        } else {
            if (!$user->google_id) {
                $user->google_id = $googleUser->getId();
            }

            // Kiểm tra xem đây có phải lần đầu login không
            $isFirstLogin = is_null($user->last_login);
            $user->last_login = now();
            $user->save();
        }

        return $this->completeLogin($request, $user, $isFirstLogin);
    }

    private function completeLogin(Request $request, User $user, bool $isFirstLogin = false)
    {
        Auth::login($user, true);

        // Nếu là lần đầu login, đồng bộ cart từ cookie
        if ($isFirstLogin) {
            $cartCookie = $request->cookie('cart');
            if ($cartCookie) {
                $cartItems = json_decode(urldecode($cartCookie), true) ?? [];
                foreach ($cartItems as $item) {
                    DB::table('cart')->updateOrInsert(
                        [
                            'user_id' => $user->user_id,
                            'album_id' => $item['album_id'],
                        ],
                        [
                            'quantity' => $item['qty'],
                            'added_at' => now(),
                        ]
                    );
                }
            }
        }

        return redirect()->intended('/');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
