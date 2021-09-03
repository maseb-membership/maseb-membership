<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'firstname' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            // 'gender' => [
            //     'string',
            // ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'password' => [
                'confirmed',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('system_user');
    }
}
