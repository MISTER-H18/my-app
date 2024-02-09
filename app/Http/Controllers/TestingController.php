<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;

class TestingController extends Controller
{
    public function test(){

        $mim_valid_date =  Carbon::now()->subYear(5)->format('Y-m-d'); 
        $date_of_birth = 'before:';
        return $date_of_birth . $mim_valid_date;
    }
}
