<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to intended page
            return redirect()->intended('/dashboard');
        }

        // Authentication failed, return back with error message
        throw ValidationException::withMessages([
            'email' => ['Invalid credentials'],
        ]);
    }
}

