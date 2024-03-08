<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalUser = DB::select('SELECT COUNT(*) AS userT FROM users UNION SELECT COUNT(*) FROM users WHERE sex = 1 UNION SELECT COUNT(*) FROM users WHERE sex = 0;');
        
        return view('dashboard')->with('totalUser',$totalUser); 
    }
}
