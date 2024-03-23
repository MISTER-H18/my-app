<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{

    public function show(Request $request)
    {
        return view('system-settings.show'); 
    }
}
