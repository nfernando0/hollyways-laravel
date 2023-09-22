<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = request()->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if(Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect('/')->with('pesan', 'Login Berhasil!');
        }

        return back()->with([
            'pesan' => 'Login Error',
        ]);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('pesan', 'Logout Berhasil!');
    }
}
