<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login(UserRequest $userRequest)
    {
        return Auth::check()
            ? $this->redirectWithError()
            : $this->authenticate($userRequest);
    }

    private function authenticate(UserRequest $userRequest)
    {
        return Auth::attempt($userRequest->validated())
            ? $this->redirectSuccessSessionData($userRequest)
            : $this->redirectWithError(config('messages.error_login'));
    }

    private function redirectSuccessSessionData(UserRequest $userRequest)
    {
        session()->regenerate();
        session(['user' => $userRequest->login]);
        return redirect(route('/'));
    }

    private function redirectWithError($message)
    {
        return back()->withErrors($message);
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect(route('user.login'))->withErrors(config('messages.logout_success'));
    }

}
