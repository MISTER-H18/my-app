<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Team;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_id' => Team::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'role' => $this->faker->randomElement(['admin', 'editor']),
            'created_at' => Carbon::today(),
            'updated_at' => Carbon::today(),
        ];
    }
}
