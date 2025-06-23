<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function profile()
    {
        $genres = DB::table('genres')->get();
        $user = auth()->user();
        return view('users.account.profile', compact('user', 'genres'));
    }



    public function updateProfile(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:1024',
        ]);

        $changed = false;

        if ($user->full_name !== $request->input('full_name')) {
            $user->full_name = $request->input('full_name');
            $changed = true;
        }
        if ($user->phone !== $request->input('phone')) {
            $user->phone = $request->input('phone');
            $changed = true;
        }
        if ($user->address !== $request->input('address')) {
            $user->address = $request->input('address');
            $changed = true;
        }

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $filename = 'avatar_' . $user->user_id . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('images/avatars', $filename, 'public');
            $user->avatar_url = '/storage/' . $path;
            $changed = true;
        }

        if ($changed) {
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
        } else {
            return redirect()->back()->with('success', 'Không có thay đổi nào được thực hiện.');
        }
    }
}
