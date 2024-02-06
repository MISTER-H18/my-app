<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Fortify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);

        Fortify::registerView(function () {

            $marital_statuses = \App\Models\MaritalStatus::all();
            $occupations = \App\Models\Occupation::all();

            return view('auth.register', ['marital_statuses' => $marital_statuses, 'occupations' => $occupations,]);
            
        });

        // Fortify::registerView(function () {

        //     $marital_statuses = \App\Models\MaritalStatus::all();
        //     $occupations = \App\Models\Occupation::all();

        //     return view('profile.update-profile-information-form', ['marital_statuses' => $marital_statuses, 'occupations' => $occupations,]);
            
        // });

        Fortify::authenticateUsing(function (Request $request) {
            $user = \App\Models\User::where('email', $request->identity_card)
            ->orWhere('identity_card', $request->identity_card)
            ->first();
            
            if($user &&
                Hash::check($request->password, $user->password)){
                return $user;
            }
        });

    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
