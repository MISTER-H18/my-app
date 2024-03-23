<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Carbon\Carbon;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // $mim_valid_date =  Carbon::today()->subYear(1)->format('Y-m-d');

        Validator::make($input, [
            'identity_card' => ['required', 'numeric', 'unique:users,identity_card'],
            'name' => ['required', 'string', 'alpha', 'max:40', 'min:3'],
            'last_name' => ['required', 'string', 'alpha', 'max:40', 'min:3'],
            // 'date_of_birth' => ['required', 'date', 'before:' . $mim_valid_date],
            'date_of_birth' => ['required', 'date'],
            'sex' => ['required'],
            'phone_number' => ['required', 'numeric', 'digits:11', 'regex:/^([0-9\s\-\+\(\)]*)$/'],
            'address' => ['required', 'string', 'max:255', 'min:10'],
            'occupation' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'min:10', 'unique:users,email'],
            'marital_status' => ['required'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'identity_card' => $input['identity_card'],
                'name' => strtolower($input['name']),
                'last_name' => strtolower($input['last_name']),
                'date_of_birth' => $input['date_of_birth'],
                'sex' => $input['sex'],
                'phone_number' => $input['phone_number'],
                'address' => strtolower($input['address']),
                'occupation' => strtolower($input['occupation']),
                'email' => $input['email'],
                'marital_status_id' => $input['marital_status'],
                'user_rol_id' => 1,
                'password' => Hash::make($input['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => "Equipo personal de ". explode(' ', ucfirst($user->name), 2)[0],
            'description' => 'Este es el equipo personal de '. explode(' ', ucfirst($user->name), 2)[0]."",
            'personal_team' => true,
        ]));
    }
}
