<?php

namespace App\Http\Requests;

use App\Rules\whichStatusId;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'login' => ['required'],
            'password' => ['required'],
            'auth_id' => [new whichStatusId()]
        ];
    }
}
