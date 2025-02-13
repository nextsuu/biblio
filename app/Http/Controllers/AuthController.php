<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show the login form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login form submission
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('books.index');
        }

        return redirect()->route('auth.login')->with('error', 'Invalid credentials');
    }

    // Show the registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle registration form submission
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user); // Log the user in after registration

        return redirect()->route('auth.login');
    }

    // Handle logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}

