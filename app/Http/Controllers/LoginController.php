<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return Auth::check()
            ? redirect(\route('/'))
            : view('login');
    }

    public function login(UserRequest $userRequest)
    {
        return Auth::check()
            ? $this->redirectError()
            : $this->authenticate($userRequest);
    }

    private function authenticate(UserRequest $userRequest)
    {
        return Auth::attempt($userRequest->validated()) && session()->regenerate()
            ? $this->returnWithMessage(config('messages.login_success'))
            : $this->returnWithMessage(config('messages.error_login'));
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return $this->returnWithMessage(config('messages.logout_success'));
    }

}
