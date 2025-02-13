<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        // Get the first user (since you don't have auth)
        $user = DB::table('users')->first();

        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the password input
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);

        // Get the first user (assuming no authentication)
        $user = DB::table('users')->first();

        if ($user) {
            // Update password
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'password' => Hash::make($request->password)
                ]);

            return redirect()->route('books.index')->with('success', 'Password updated successfully!');
        }

        return back()->with('error', 'User not found.');
    }
}
