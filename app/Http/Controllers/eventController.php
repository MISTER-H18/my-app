<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class eventController extends Controller
{
    //
    public function event()
    {
        $all_events = Event::all();
        $events = [];
        foreach ($all_events as $event) {
            $events[] = [
                'title' => $event->event,
                'start' => $event->start_date,
                'end' => $event->end_date,
            ];
        }

        return view('curso\event', compact('events'));
    }
    public function EventCrud()
    {
        $event = DB::select("SELECT id,event, date(start_date) as start_date,date(end_date) as end_date,description FROM events");
        return view('event\eventCrud')->with('event', $event);
    }
    public function create()
    {
        return view('event\createEvent');
    }
    public function store(Request $request)
    {

        try {
            $sql = DB::insert('INSERT INTO events (event, start_date,end_date,description) values(?,?,?,?)', [$request->name_event, $request->start_date, $request->end_date, $request->description,]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('event\eventCrud' );
        } else {
            return redirect()->route('event\eventCrud' );
        }
    }
    public function show($id){
        $event= DB::select("SELECT * FROM events WHERE id = $id") ;
        return view('event\show') ->with('event',$event);  
    }
    public function destroy($id){
        $sqls=DB::delete(  "DELETE FROM events WHERE id = $id");
        $events=DB::select("SELECT * FROM events");
    if ($sqls == true){
        return redirect()->route('event\eventCrud' );
    }else {
        return redirect()->route('event\eventCrud' );
        
    }
    
}
}
