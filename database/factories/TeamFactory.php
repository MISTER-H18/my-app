<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laravel\Jetstream\Features;
use Carbon\Carbon;

use App\Models\Team;
use App\Models\User;
use App\Models\MaritalStatus;
use App\Models\UserRoles;

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

    // public function configure(callable $callback = null): static
    // {
    //     if (!Features::hasTeamFeatures()) {
    //         return $this->state([]);
    //     }

    //     return $this->has(
    //         User::factory()
    //             ->state(fn(array $attributes, Team $team) => [

    //                 'identity_card' => $this->faker->unique()->numberBetween(10000000, 30000000),
    //                 'name' => strtolower($this->faker->firstName()),
    //                 'last_name' => strtolower($this->faker->lastName()),
    //                 'date_of_birth' => $this->faker->date('Y-m-d', Carbon::now()->subDays(rand(0, 180))),
    //                 'sex' => array_rand([0, 1]),
    //                 'phone_number' => $this->faker->phoneNumber(),
    //                 'address' => strtolower($this->faker->address()),
    //                 'occupation' => strtolower($this->faker->unique()->jobTitle()),
    //                 'email' => $this->faker->unique()->safeEmail(),
    //                 'email_verified_at' => Carbon::now()->subDays(rand(0, 179))->format('Y-m-d'),
    //                 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    //                 'two_factor_secret' => null,
    //                 'two_factor_recovery_codes' => null,
    //                 'remember_token' => Str::random(10),

    //                 'profile_photo_path' => null,
    //                 'current_team_id' => $team->id,
    //                 'marital_status_id' => MaritalStatus::inRandomOrder()->first()->id,
    //                 'user_rol_id' => UserRoles::inRandomOrder()->first()->id,

    //             ])
    //             ->when(is_callable($callback), $callback),
    //         'owner'
    //     );
    // }

}
