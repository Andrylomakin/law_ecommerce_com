<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthLoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Аутентификация успешна...
            return redirect()->intended('/admin');
        }

        // Аутентификация не удалась...
        return redirect()->back()->withInput()->withErrors(['email' => 'Неверный email или пароль']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

}
