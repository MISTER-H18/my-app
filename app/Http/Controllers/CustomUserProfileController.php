<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Laravel\Jetstream\Http\Controllers\Livewire\UserProfileController;

class CustomUserProfileController extends UserProfileController
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('profile.show')->with([
            'request' => $request,
            'user' => $request->user(),
        ]);

    }

}