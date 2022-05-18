<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use \Illuminate\Http\Request;

class AdminController extends Controller
{

    public function addSessionData(Request $request)
    {
        session(['color' => $request->color]);
        return $this->redirectWithSuccess();
    }

    public function create(UserRequest $userRequest)
    {
        return User::where('login', $userRequest->login)->exists()
            ? $this->redirectWithError()
            : $this->save($userRequest);
    }

    private function save(UserRequest $userRequest)
    {
        return User::create($userRequest->post())
            ? $this->redirectWithSuccess()
            : $this->redirectWithError();
    }

    private function redirectWithSuccess()
    {
        return back()->withErrors([
            'user_created' => config('messages.user_created'),
            'color_changed' => config('messages.color_changed')
        ]);
    }

    private function redirectWithError()
    {
        return back()->withErrors([
            'create_error' => config('messages.create_error')
        ]);
    }


}
