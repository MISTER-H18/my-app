<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Carbon\Carbon;

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
            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'two_factor_secret' => null,
            // 'two_factor_recovery_codes' => null,
            // 'remember_token' => Str::random(10),
            // 'profile_photo_path' => null,
            // 'current_team_id' => null,
            
            'identity_card' => $this->faker->unique()->numberBetween(10000000, 30000000),
            'name' => $this->faker->firstName(),
            // 'middle_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            // 'second_last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date('Y-m-d', Carbon::now()->subYear(5)),
            'sex' => $this->faker->randomElement([0,1]),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'email' => $this->faker->unique()->safeEmail(),
            // 'password' => $this->faker->unique()->password(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //It means password
            'email_verified_at' => now(),
            
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,

            'marital_status_id' => \App\Models\MaritalStatus::inRandomOrder()->first()->id,
            'occupation_id' => \App\Models\Occupation::inRandomOrder()->first()->id,
        ];
    }

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
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name.'\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
