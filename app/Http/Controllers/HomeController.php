<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\json;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $totalEvents = DB:: select( 'SELECT COUNT(*) AS total  FROM events' );
        $totalCourse = DB:: select( 'SELECT COUNT(*) AS total  FROM courses' );
        $totalUSer = DB:: select( 'SELECT COUNT(*) AS total  FROM users' );
        $totalUserComparacion = DB::select('SELECT COUNT(*) AS userT FROM users UNION SELECT COUNT(*) FROM users WHERE sex = 1 UNION SELECT COUNT(*) FROM users WHERE sex = 0;');

        
        $data = [];
        foreach($totalUserComparacion as $comparacion){
            $data['comparacion'][]=$comparacion->userT;
        }
        $data['data'] = json_encode($data);

        return view('dashboard', $data)->with('totalUser',$totalUSer)->with('totalCourse',$totalCourse)->with('totalEvents',$totalEvents); 
    }
}
