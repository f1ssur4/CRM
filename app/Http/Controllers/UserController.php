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
//            'color' => 'required'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect(route('/'));
        }

        return back()->withErrors([
            'login' => 'Wrong login or password',
        ])->onlyInput('login');
    }

    public function create(Request $request)
    {
        if (Auth::check()){
            return redirect(route('/'));
        }

        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
//            'color' => 'required'
        ]);

        if (Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect(route('/'));
        }

        return back()->withErrors([
            'login' => 'Wrong login or password',
        ])->onlyInput('login');
    }
}
