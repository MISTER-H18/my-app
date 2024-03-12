<?php

namespace Database\Factories;

use App\Models\MaritalStatus;
use App\Models\Team;
use App\Models\User;
use App\Models\UserRoles;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->unique()->company(),
            'description' => $this->faker->text(90),
            'personal_team' => array_rand([true, false]),
        ];
    }

    // public function configure()
    // {
    //     if (!Features::hasTeamFeatures()) {
    //         return $this->state([]);
    //     }

    //     return $this->afterCreating(function (){
            
    //         $this->forOwner(
    //             User::factory()
    //             ->state(fn(array $attributes, Team $team) => [
    //                 'identity_card' => '12345678',
    //                 'name' => strtolower('adminName'),
    //                 'last_name' => strtolower('adminLastName'),
    //                 'date_of_birth' => Carbon::now()->subDays(rand(0, 180)),
    //                 'sex' => array_rand([0, 1]),
    //                 'phone_number' => '04122282782',
    //                 'address' => strtolower('admin address'),
    //                 'occupation' => strtolower('Administrator'),
    //                 'email' => 'myadminuser@example.com',
    //                 'email_verified_at' => Carbon::now()->format('Y-m-d'),
    //                 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    //                 'two_factor_secret' => null,
    //                 'two_factor_recovery_codes' => null,
    //                 'remember_token' => Str::random(10),

    //                 'profile_photo_path' => null,
    //                 'current_team_id' => $team->id,
    //                 'marital_status_id' => MaritalStatus::inRandomOrder()->first()->id,
    //                 'user_rol_id' => UserRoles::inRandomOrder()->first()->id,
    //             ])
    //         );
    //     })->afterCreating(function (Team $team) {
    //         $team->user_id = $team->id;
    //         $team->save();
    //     });

    // }

}
