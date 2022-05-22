<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    public function createUser(UserRequest $userRequest)
    {
        return User::where('login', $userRequest->login)->exists()
            ? $this->redirectWithMessage(config('messages.create_user_error'))
            : $this->save($userRequest);
    }

    public function getUsersList(User $user)
    {
        return $user->all()->reject(function ($user) {
            return $user->status_id < 1;
        })->map(function ($user) {
            return $user->login;
        });
    }

    private function save(UserRequest $userRequest)
    {
        return User::create($userRequest->validated())
            ? $this->redirectWithMessage(config('messages.create_user_success'))
            : $this->redirectWithMessage(config('messages.create_user_error'));
    }

    private function redirectWithMessage($message)
    {
        return back()->withErrors($message);
    }


}
