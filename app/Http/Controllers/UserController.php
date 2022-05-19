<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{

    public function createUser(UserRequest $userRequest)
    {
        return User::where('login', $userRequest->login)->exists()
            ? $this->redirectWithError(config('messages.create_user_error'))
            : $this->save($userRequest);
    }

    private function save(UserRequest $userRequest)
    {
        return User::create($userRequest->validated())
            ? $this->redirectWithSuccess(config('messages.create_user_success'))
            : $this->redirectWithError(config('messages.create_user_error'));
    }

    private function redirectWithSuccess($successMessage)
    {
        return back()->withErrors($successMessage);
    }

    private function redirectWithError($errorMessage)
    {
        return back()->withErrors($errorMessage);
    }


}
