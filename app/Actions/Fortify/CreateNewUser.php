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
        // $mim_valid_date =  Carbon::today()->subYear(1)->format('Y-m-d');

        Validator::make($input, [
            'identity_card' => ['required','numeric', 'unique:users,identity_card'],
            'name' => ['required', 'string', 'alpha', 'lowercase', 'max:40', 'min:3'],
            // 'middle_name' => ['required', 'string', 'alpha', 'lowercase', 'max:40', 'min:3'],
            'last_name' => ['required', 'string', 'alpha', 'lowercase', 'max:40', 'min:3'],
            // 'second_last_name' => ['required', 'string', 'alpha', 'lowercase', 'max:40', 'min:3'],

            // 'date_of_birth' => ['required', 'date', 'before:' . $mim_valid_date],
            'date_of_birth' => ['required', 'date',],

            'phone_number' => ['required','numeric', 'digits:11', 'regex:/^([0-9\s\-\+\(\)]*)$/',],
            'email' => ['required', 'string', 'email', 'max:255', 'min:10', 'unique:users,email'],
            'sex' => ['required','boolean'],
            'address' => ['required', 'string', 'max:255', 'min:10'],
            'marital_status' => ['required', 'integer'],
            'occupation' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return User::create([
            'identity_card' => $input['identity_card'],
            'name' => $input['name'],
            // 'middle_name' => $input['middle_name'],
            'last_name' => $input['last_name'],
            // 'second_last_name' => $input['second_last_name'],
            'date_of_birth' => $input['date_of_birth'],
            'phone_number' => $input['phone_number'],
            'email' => $input['email'],
            'sex' => $input['sex'],
            'address' => $input['address'],
            'marital_status_id' => $input['marital_status'],
            'occupation_id' => $input['occupation'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
