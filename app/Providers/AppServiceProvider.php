<?php

namespace App\Providers;

use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

use App\Models\MaritalStatus;
use App\Models\Occupation;

class AppServiceProvider extends ServiceProvider
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
        
        Facades\View::composer(['profile.update-profile-information-form', 'auth.register'], function (View $view) {
            
            $marital_statuses = MaritalStatus::select('id', 'status')->orderBy('id', 'ASC')->get();
            $occupations = Occupation::select('id', 'job_title')->orderBy('id', 'ASC')->get();

            $view->with([
                'marital_statuses' => $marital_statuses,
                'occupations' => $occupations,
            ]);
            
        });
    }
}
