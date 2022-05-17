<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()){
            return redirect(route('/'));
        }

        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();
            $request->session()->put('user', $request->login);
            return redirect(route('/'));
        }

        return back()->withErrors([
            'login' => 'Wrong login or password',
        ])->onlyInput('login');
    }

}
