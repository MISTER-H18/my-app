<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CursoController extends Controller
{
    //---------------------------------------------------------------------------------------//
    public function index()
    {
        $curso = DB::select("SELECT courses.estado,users.name,users.last_name,courses.id,courses.course_name, courses.teacher_id,date(courses.start_date)as start_date,date(courses.end_date)as end_date,courses.description,courses.image FROM users
        INNER JOIN user_roles ON user_roles.id = users.user_rol_id
        INNER JOIN courses ON courses.teacher_id = users.id
        WHERE user_roles.rol_name = 'Docente' and courses.estado = 1");
        return view('curso\inicioCurso')->with('curso', $curso);
    }
    //---------------------------------------------------------------------------------------//
    public function create()
    {
        $docentes = DB::select("select name, last_name, users.id from users INNER JOIN user_roles ON user_roles.id = users.user_rol_id WHERE user_roles.rol_name = 'Docente';");
        //$docentes=User::where('active','=', 1)->get();
        return view('curso\create')->with('docentes', $docentes);
    }
    //---------------------------------------------------------------------------------------//
    public function destroy($id)
    {
        $sqls = DB::delete("DELETE FROM courses WHERE id = $id");
        if ($sqls == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Curso eliminado exitosamente!');;
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    //---------------------------------------------------------------------------------------//
    public function destroyA($id)
    {
        $sqls = DB::delete("DELETE FROM task WHERE id = $id");
        if ($sqls == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Material eliminado exitosamente!');;
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    //---------------------------------------------------------------------------------------//
    public function update(Request $request)
    {
        $fechaActual = Carbon::now();
        if ($request->InCurso < $fechaActual || $request->FinCurso < $fechaActual  ) {
            return redirect()->route('curso.cursoCrud')->with('error', 'Seleccione Fechas Correctas, estas fechas expiraron');
        }
        $destino = 'img/'; // ruta donde se guardaran las imagenes
        try {

            if (!$request->hasFile('featured')) {
                // No se ha seleccionado ninguna imagen
                try {
                    //code...
                    $sql = DB::update("UPDATE courses SET course_name=?, teacher_id=?, start_date=?, end_date=?, description=? WHERE id=? ", [
                        $request->NomCurso,
                        $request->id_docente,
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
                    return redirect()->route('curso.cursoCrud')->with('success', '¡Curso modificado exitosamente!');
                } else {
                    return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
                }
            }
            // Upload the new image
            $p1 = time() . $request->file('featured')->getClientOriginalName();
            $a1 = $request->file('featured')->move($destino, $p1);
            $sql = DB::update("UPDATE courses SET course_name=?, teacher_id=?, start_date=?, end_date=?, description=?,image=? WHERE id=? ", [
                $request->NomCurso,
                $request->id_docente,
                $request->InCurso,
                $request->FinCurso,
                $request->description,
                $p1,
                $request->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Curso modificado exitosamente!');
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    //---------------------------------------------------------------------------------------//
    public function updateA(Request $request)
    {
        $destino = 'file/'; // ruta donde se guardaran las imagenes
        try {

            if (!$request->hasFile('featured')) {
                // No se ha seleccionado ninguna imagen
                try {
                    //code...
                    $sql = DB::update("UPDATE tasks SET task=?, description=? WHERE id=? ", [
                        $request->NomCurso,
                        $request->description,
                        $request->id,
                    ]);
                } catch (\Throwable $th) {
                    //throw $th;
                    $sql = 0;
                }
                if ($sql == true) {
                    return redirect()->route('curso.cursoCrud')->with('success', '¡Curso modificado exitosamente!');
                } else {
                    return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
                }
            }
            // Upload the new image
            $p1 = time() . $request->file('featured')->getClientOriginalName();
            $a1 = $request->file('featured')->move($destino, $p1);
            $sql = DB::update("UPDATE tasks SET task=?, description=?, ruta=? WHERE id=? ", [
                $request->NomCurso,
                $request->description,
                $p1,
                $request->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Curso modificado exitosamente!');
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    //---------------------------------------------------------------------------------------//
    public function show($id)
    {
        $docentes = DB::select("select name, last_name, users.id from users INNER JOIN user_roles ON user_roles.id = users.user_rol_id WHERE user_roles.rol_name = 'Docente';");
        $curso = DB::select("SELECT courses.id, course_name, teacher_id, date(start_date)as start_date, date(end_date)as end_date, description, image FROM courses WHERE id = $id ");
        return view('curso\show',)->with('curso', $curso)->with('docentes', $docentes);
    }
    //---------------------------------------------------------------------------------------//
    public function showA($id)
    {
        $task = DB::select("SELECT * FROM `tasks`WHERE id = $id;");
        return view('curso\showActividad',)->with('task', $task);
    }
    //---------------------------------------------------------------------------------------//
    public function buscar($id)
    {
        $actividades = DB::select("SELECT tasks.id,course_id, task, tasks.description, ruta, tasks.estado FROM tasks INNER JOIN courses ON tasks.course_id = courses.id WHERE courses.id = $id and tasks.estado = 1 ");
        $curso = DB::select("SELECT courses.id, course_name FROM courses WHERE id = $id ");
        return view('curso\actividades')->with('curso', $curso)->with('actividades', $actividades);
    }
    //---------------------------------------------------------------------------------------//
    public function CursoCrud()
    {
        $curso = DB::select("SELECT courses.estado,users.name,users.last_name,courses.id,courses.course_name, courses.teacher_id,date(courses.start_date) as start_date,date(courses.end_date) as end_date,courses.description,courses.image FROM users
        INNER JOIN user_roles ON user_roles.id = users.user_rol_id
        INNER JOIN courses ON courses.teacher_id = users.id
        WHERE user_roles.rol_name = 'Docente'");
        return view('curso\cursosCrud')->with('curso', $curso);
    }
    //---------------------------------------------------------------------------------------//
    public function createA($id)
    {
        return view('curso\createActividad')->with('id', $id);
    }
    //---------------------------------------------------------------------------------------//
    public function actividadesCrud($id)
    {
        $curso = DB::select("SELECT tasks.id,course_id, task, tasks.description, ruta, tasks.estado FROM tasks INNER JOIN courses ON tasks.course_id = courses.id WHERE courses.id = $id ");
        return view('curso\crudActividades')->with('curso', $curso)->with('id', $id);
    }
    //---------------------------------------------------------------------------------------//
    //Metodo para guardar los cursos en la base de datos
    public function store(Request $request)
    {
        $comparar = DB::select("SELECt teacher_id from courses WHERE courses.estado ='1'AND MONTH(courses.start_date) = MONTH(CURRENT_DATE()) AND YEAR(courses.start_date) = YEAR(CURRENT_DATE())");
        $fechaActual = Carbon::now();
        if ($request->InCurso < $fechaActual || $request->FinCurso < $fechaActual  ) {
            return redirect()->route('curso.cursoCrud')->with('error', 'Seleccione Fechas Correctas, estas fechas ya pasaron');
        }
        foreach ($comparar as $compa) {
            
            if ($request->id_docente == $compa->teacher_id ) {
                return redirect()->route('curso.cursoCrud')->with('error', 'El profesor ya esta registrado en un curso este mes');
            }
        }
        $destino = 'img/'; // ruta donde se guardaran las imagenes

        try {
            $sql = DB::insert('INSERT INTO courses (course_name, teacher_id,start_date,end_date,description,image ) values(?,?,?,?,?,?)', [
                $request->NomCurso,
                $request->id_docente,
                $request->InCurso,
                $request->FinCurso,
                $request->description,
                $p1 = $request->file('featured')->getClientOriginalName(),
            ]);
            $a1 = time() . $request->file('featured')->move($destino, $p1);
        } catch (\Throwable $th) {
            //throw $th; 
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Curso creado exitosamente!');
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló la creación del Curso. Intenta nuevamente.');
        }
    }
    //---------------------------------------------------------------------------------------//
    public function storeA(Request $request)
    {
        $destino = 'file/'; // ruta donde se guardaran las imagenes

        try {
            $sql = DB::insert('INSERT INTO tasks (course_id, task,description,ruta ) values(?,?,?,?)', [
                $request->course_id,
                $request->NomCurso,
                $request->description,
                $p1 = $request->file('featured')->getClientOriginalName(),
            ]);
            $a1 = time() . $request->file('featured')->move($destino, $p1);
        } catch (\Throwable $th) {
            //throw $th; 
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Material agreado exitosamente!');
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    //--------------------------------------------------------------------------------------//
    public function updateEstadoActividad(Request $request)
    {
        try {
            $sql = DB::update("UPDATE tasks SET estado= ? WHERE id= ? ", [
                $request->tipo,
                $request->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Actividad modificada exitosamente!');
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    public function updateEstado(Request $request)
    {
        try {
            $sql = DB::update("UPDATE courses SET estado=? WHERE id=? ", [
                $request->estado,
                $request->id,
            ]);
        } catch (\Throwable $th) {
            //throw $th;
            $sql = 0;
        }
        if ($sql == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Curso modificado exitosamente!');
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
}
