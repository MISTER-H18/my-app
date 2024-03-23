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
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'identity_card' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'name' => ['required', 'string', 'alpha', 'max:40', 'min:3'],
            'last_name' => ['required', 'string', 'alpha', 'max:40', 'min:3'],
            'date_of_birth' => ['required', 'date'],
            'sex' => ['required'],
            'phone_number' => ['required', 'numeric', 'digits:11', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'address' => ['required', 'string', 'max:255', 'min:10'],
            'occupation' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'email', 'max:255', 'min:10', Rule::unique('users')->ignore($user->id)],
            'marital_status_id' => ['required'],
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
                'name' => strtolower($input['name']),
                'last_name' => strtolower($input['last_name']),
                'date_of_birth' => $input['date_of_birth'],
                'sex' => $input['sex'],
                'phone_number' => $input['phone_number'],
                'address' => strtolower($input['address']),
                'occupation' => strtolower($input['occupation']),
                'email' => $input['email'],
                'marital_status_id' => $input['marital_status_id'],
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
