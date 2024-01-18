<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'identity_card' => ['required','string', 'max:10', 'unique:users'],
            'name' => ['required', 'string', 'alpha', 'max:45', 'min:3'],
            // 'middle_name' => ['required', 'string', 'alpha', 'max:45', 'min:3'],
            'last_name' => ['required', 'string', 'alpha', 'max:45', 'min:3'],
            // 'second_last_name' => ['required', 'string', 'alpha', 'max:45', 'min:3'],

            'start_date_field' => Carbon::now()->subYear(120)->format('Y m d'),
            'end_date_field' =>  Carbon::now()->subYear(5)->format('Y m d'),
            //'after:start_date_field', 'before:end_date_field'
            'birth_date' => ['required','date'],

            'email' => ['required', 'string', 'email', 'max:255', 'min:10', 'unique:users'],
            'sex' => ['required'],
            'address' => ['required', 'string', 'max:255', 'min:10'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'identity_card' => $input['identity_card'],
            'name' => $input['name'],
            // 'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],
            // 'second_last_name' => $input['second_last_name'],
            'birth_date' => $input['birth_date'],
            'email' => $input['email'],
            'sex' => $input['sex'],
            'address' => $input['address'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
