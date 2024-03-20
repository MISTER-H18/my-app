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
    public function update(Request $request)
    {
        try {
            $sql = DB::update("UPDATE events SET event=?, start_date=?, end_date=?, description=? WHERE id=? ", [
                $request->event,
                $request->InCurso,
                $request->FinCurso,
                $request->description,
                $request->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('event.EventCrud')->with('success', '¡Evento modificado exitosamente!');
        } else {
            return redirect()->route('event.EventCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
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
            return redirect()->route('event.EventCrud')->with('success', '¡Evento creado exitosamente!');
        } else {
            return redirect()->route('event.EventCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    public function show($id)
    {
        $event = DB::select("SELECT id ,event, date(start_date) as start_date,date(end_date) as end_date,description FROM events WHERE id = $id");
        return view('event\show')->with('event', $event);
    }
    public function destroy($id)
    {
        $sqls = DB::delete("DELETE FROM events WHERE id = $id");
        if ($sqls == true) {
            return redirect()->route('event.EventCrud')->with('success', '¡Evento eliminado exitosamente!');
        } else {
            return redirect()->route('event.EventCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    public function statistics()
    {
        $dataProfesiones = DB::select("SELECT rol_name AS profesion FROM user_roles WHERE rol_name <> 'Admin';");
        $cuentaProfesiones = DB::select("SELECT user_roles.rol_name, user_rol_id, COUNT(*) AS total
        FROM users
        INNER JOIN user_roles ON users.user_rol_id = user_roles.id
        WHERE user_roles.rol_name <> 'Administrador'
        GROUP BY user_rol_id, user_roles.rol_name;");
        $cuentaEdades = DB::select("SELECT COUNT(*) AS cuentaEdades FROM users WHERE timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) > 0 AND timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) < 14 
        UNION SELECT COUNT(*)FROM users WHERE timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) > 14 AND timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) < 25
        UNION SELECT COUNT(*)FROM users WHERE timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) > 24 AND timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) < 35
        UNION SELECT COUNT(*)FROM users WHERE timestampdiff(YEAR, users.date_of_birth, CURRENT_DATE) > 34;");
        $dataP = [];
        foreach ($dataProfesiones as $comparacion) {
            $dataP['comparacion'][] = $comparacion->profesion;
        }
        $dataP['dataP'] = json_encode($dataP); 
        $profesiones = [];
        foreach ($cuentaProfesiones as $comparacionA) {
            $profesiones['comparacionA'][] = $comparacionA->total;
        }
        $profesiones['profesiones'] = json_encode($profesiones);
        $edades = [];
        foreach ($cuentaEdades as $comparacionB) {
            $edades['comparacionB'][] = $comparacionB->cuentaEdades;
        }
        $edades['edades'] = json_encode($edades);
        return view("members.estadisticas", $edades, $profesiones)->with($dataP);
    }
}

//hacer un boton que me cambie un estado para decir si va a cambiar la img o no