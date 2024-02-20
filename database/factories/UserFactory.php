<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Carbon\Carbon;

use App\Models\MaritalStatus;
use App\Models\Team;
use App\Models\User;
use App\Models\UserRoles;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'identity_card' => $this->faker->unique()->numberBetween(10000000, 30000000),
            'name' => strtolower($this->faker->firstName()),
            'last_name' => strtolower($this->faker->lastName()),
            'date_of_birth' => $this->faker->date('Y-m-d', Carbon::now()->subDays(rand(0, 180))),
            'sex' => array_rand([0, 1]),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => strtolower($this->faker->address()),
            'occupation' => strtolower($this->faker->unique()->jobTitle()),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => $this->faker->randomElement([null, Carbon::now()->subDays(rand(0, 179))->format('Y-m-d')]),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),

            'profile_photo_path' => null,
            'current_team_id' => null,
            'marital_status_id' => MaritalStatus::inRandomOrder()->first()->id,
            'user_rol_id' => UserRoles::inRandomOrder()->first()->id,
        ];
    }

    // public function configure()
    // {
    //     return $this->afterCreating(function (User $user) {

    //         $user->ownedTeams()->save(Team::forceCreate([
    //             'user_id' => $user->id,
    //             'name' => "Equipo personal de ". explode(' ', ucfirst($user->name), 2)[0],
    //             'description' => 'Este es el equipo personal de '. explode(' ', ucfirst($user->name), 2)[0],
    //             'personal_team' => true,
    //         ]));
            
    //     });
    // }

    // public function configure()
    // {
    //     return $this->state(function (Team $team) {
    //         return [
    //             'current_team_id' => $team->id,
    //         ];
    //     });
    // }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn(array $attributes, User $user) => [
                    'user_id' => $user->id,
                    'name' => "Equipo personal de ". explode(' ', ucfirst($user->name), 2)[0],
                    'description' => 'Este es el equipo personal de '. explode(' ', ucfirst($user->name), 2)[0],
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
