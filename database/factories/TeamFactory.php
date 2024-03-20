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

}
