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
            'user_id' => null,
            'name' => $this->faker->unique()->company(),
            'description' => $this->faker->text(90),
            'personal_team' => array_rand([true, false]),
        ];
    }

    // public function withPersonalTeam(callable $callback = null): static
    // {
    //     if (!Features::hasTeamFeatures()) {
    //         return $this->state([]);
    //     }

    //     return $this->has(
    //         Team::factory()
    //             ->state(fn(array $attributes, User $user) => [
    //                 'user_id' => $user->id,
    //                 'name' => "Equipo personal de " . explode(' ', ucfirst($user->name), 2)[0],
    //                 'description' => 'Este es el equipo personal de ' . explode(' ', ucfirst($user->name), 2)[0],
    //                 'personal_team' => true,
    //             ])
    //             ->when(is_callable($callback), $callback),
    //         'ownedTeams'
    //     )->afterCreating(function (User $user) {
    //         $user->current_team_id = $user->id;
    //         $user->save();
    //     });
    // }

    // public function configure()
    // {
    //     return $this->afterCreating(function (User $user) {

    //         $user->save(User::forceCreate([
    //             'user_id' => $user->id,
    //             'name' => "Equipo personal de ". explode(' ', ucfirst($user->name), 2)[0],
    //             'description' => 'Este es el equipo personal de '. explode(' ', ucfirst($user->name), 2)[0],
    //             'personal_team' => true,
    //         ]))->afterCreating(function (Team $team) {
    //             $team->user_id = $user->id;
    //             $team->save();
    //         });
            
    //     });
    // }

}
