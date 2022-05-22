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
            ? $this->redirectSuccess(config('messages.login_success'))
            : $this->redirectError(config('messages.error_login'));
    }

    private function redirectSuccess(array $message)
    {
        return redirect(route('/'))->withErrors($message);
    }

    private function redirectError(array $message)
    {
        return back()->withErrors($message);
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return $this->redirectSuccess(config('messages.logout_success'));
    }

}
