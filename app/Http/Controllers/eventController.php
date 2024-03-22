<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class eventController extends Controller
{
    //--------------------------------------------------------------------------------------//
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
    //--------------------------------------------------------------------------------------//
    public function EventCrud()
    {
        $event = DB::select("SELECT events.estado,events.id, event, date(start_date) as start_date, date(end_date) as end_date, description, users.name AS encargado_name, users.last_name AS Snombre FROM events INNER JOIN users ON users.id = events.encargado_id;");
        return view('event\eventCrud')->with('event', $event);
    }
    //--------------------------------------------------------------------------------------//
    public function create()
    {   
        $docentes = DB::select("select name, last_name, users.id from users;");
        return view('event\createEvent')->with('docentes',$docentes);
    }
    //--------------------------------------------------------------------------------------//
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
    //--------------------------------------------------------------------------------------//
    public function store(Request $request)
    {

        try {
            $sql = DB::insert('INSERT INTO events (event, start_date,end_date,description,encargado_id) values(?,?,?,?,?)', [$request->name_event, $request->start_date, $request->end_date, $request->description,$request->id_docente]);
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
    //--------------------------------------------------------------------------------------//
    public function show($id)
    {   $encargado =DB ::select("select name, last_name, id from users;");
        $event = DB::select("SELECT id ,event, date(start_date) as start_date,date(end_date) as end_date,description, encargado_id FROM events WHERE id = $id");
        return view('event\show')->with('event', $event)->with('encargado',$encargado);
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
    public function pdf()
    {
        $events = DB::select("");
        $pdf = Pdf::loadView('members.pdf');
        return $pdf->stream();
    }
    public function pdfEvent()
    {
        $events = DB::select("SELECT events.estado,events.id, event, date(start_date) as start_date, date(end_date) as end_date, description, users.name AS encargado_name, users.last_name AS Snombre FROM events INNER JOIN users ON users.id = events.encargado_id WHERE estado = 1;");
        $pdf = Pdf::loadView('event.pdf',compact('events'));
        return $pdf->stream(); 
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
    public function updateEvent(Request $request)
    {
        try {
            $sql = DB::update("UPDATE events SET estado=? WHERE id=? ", [
                $request->estado,
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
}

//hacer un boton que me cambie un estado para decir si va a cambiar la img o no