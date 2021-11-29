<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'father_name' => ['required', 'string', 'max:255'],
            'grand_father_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'birth_date' => ['required','string'],
            'nationality' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $bd = \Carbon\Carbon::createFromFormat('m/d/Y', $input['birth_date'])->toDateString();

        return User::create([
            'name' => $input['name'],
            'father_name' => $input['father_name'],
            'grand_father_name' => $input['grand_father_name'],
            'gender' => $input['gender'],
            'birth_date' => $bd,
            'nationality' => $input['nationality'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
