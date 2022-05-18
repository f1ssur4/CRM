<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(UserRequest $userRequest)
    {
        return $this->isAuth()
            ? $this->redirectWithErrorAuth()
            : $this->authenticate($userRequest);
    }

    private function isAuth(): bool
    {
        return Auth::check();
    }

    private function redirectWithErrorAuth()
    {
        return redirect(route('/'));
    }

    private function authenticate(UserRequest $userRequest)
    {
        return Auth::attempt($userRequest->validated())
            ? $this->redirectSuccessSessionData($userRequest)
            : $this->redirectWithErrorValidation();
    }

    private function redirectSuccessSessionData(UserRequest $userRequest)
    {
        session()->regenerate();
        session(['user' => $userRequest->login]);
        return redirect(route('/'));
    }

    private function redirectWithErrorValidation()
    {
        return back()->withErrors([
            'error_validation' => config('messages.error_validation'),
        ])->onlyInput('login');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect(route('user.login'))->withErrors([
            'success_logout' => config('messages.success_logout')
        ]);
    }

}
