<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            // 'grand_father_name'     => [
            //     'string',
            //     'required',
            // ],
            // 'gender' => [
            //     'string',
            // ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
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
