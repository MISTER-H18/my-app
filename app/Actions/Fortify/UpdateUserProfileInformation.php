<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'identity_card' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'alpha', 'lowercase', 'max:40', 'min:3'],
            // 'middle_name' => ['required', 'string', 'lowercase', 'max:40', 'min:3'],
            'last_name' => ['required', 'string', 'alpha', 'lowercase', 'max:40', 'min:3'],
            // 'second_last_name' => ['required', 'string', 'lowercase', 'max:40', 'min:3'],
            // 'date_of_birth' => ['required', 'date', 'before:' . $mim_valid_date],
            'date_of_birth' => ['required', 'date'],
            'phone_number' => ['required', 'numeric', 'digits:11', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'email' => ['required', 'email', 'max:255', 'min:10', Rule::unique('users')->ignore($user->id)],
            'sex' => ['required', 'boolean'],
            'address' => ['required', 'string', 'max:255', 'min:10'],
            'marital_status_id' => ['required'],
            'occupation_id' => ['required'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
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
                'marital_status_id' => $input['marital_status_id'],
                'occupation_id' => $input['occupation_id'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
