<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class TestingController extends Controller
{
    public function test(){
        $date = Carbon::now()->subYear(120)->format('Y m d');
        $date2 = Carbon::now()->subYear(5)->format('Y m d');
        return $date;
    }
}
