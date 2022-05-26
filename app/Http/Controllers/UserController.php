<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    public function createUser(UserRequest $userRequest)
    {
        return User::where('login', $userRequest->login)->exists()
            ? $this->returnWithMessage(config('messages.create_user_error'))
            : $this->save($userRequest);
    }

    public function getUsersList(User $user)
    {
        return $user->all()->reject(function ($user) {
            return $user->auth_id < 1;
        })->map(function ($user) {
            return $user->login;
        });
    }

    private function save(UserRequest $userRequest)
    {
        return User::create($userRequest->validated())
            ? $this->returnWithMessage(config('messages.create_user_success'))
            : $this->returnWithMessage(config('messages.create_user_error'));
    }


}
