<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index()
    {
        $curso = DB::select("SELECT users.name,users.last_name,courses.course_name, courses.teacher_id,date(courses.start_date)as start_date,date(courses.end_date)as end_date,courses.description,courses.image FROM users
        INNER JOIN user_roles ON user_roles.id = users.user_rol_id
        INNER JOIN courses ON courses.teacher_id = users.id
        WHERE user_roles.rol_name = 'Docente'");
        return view('curso\inicioCurso')->with('curso', $curso);
    }
    public function create()
    {
        $docentes = DB::select("select name, last_name, users.id from users INNER JOIN user_roles ON user_roles.id = users.user_rol_id WHERE user_roles.rol_name = 'Docente';");
        //$docentes=User::where('active','=', 1)->get();
        return view('curso\create')->with('docentes', $docentes);
    }
    public function destroy($id)
    {
        $sqls = DB::delete("DELETE FROM courses WHERE id = $id");
        if ($sqls == true) {
            return redirect()->route('curso.cursoCrud')->with('success', '¡Curso eñiminado exitosamente!');;
        } else {
            return redirect()->route('curso.cursoCrud')->with('error', 'Falló. Intenta nuevamente.');
        }
    }
    public function update(Request $request)
    {
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
    public function show($id)
    {
        $docentes = DB::select("select name, last_name, users.id from users INNER JOIN user_roles ON user_roles.id = users.user_rol_id WHERE user_roles.rol_name = 'Docente';");
        $curso = DB::select("SELECT id, course_name, teacher_id, date(start_date)as start_date, date(end_date)as end_date, description, image FROM courses WHERE id = $id ");
        return view('curso\show')->with('curso', $curso)->with('docentes', $docentes);
    }
    public function CursoCrud()
    {
        $curso = DB::select("SELECT users.name,users.last_name,courses.id,courses.course_name, courses.teacher_id,date(courses.start_date) as start_date,date(courses.end_date) as end_date,courses.description,courses.image FROM users
        INNER JOIN user_roles ON user_roles.id = users.user_rol_id
        INNER JOIN courses ON courses.teacher_id = users.id
        WHERE user_roles.rol_name = 'Docente'");
        return view('curso\cursosCrud')->with('curso', $curso);
    }
    //Metodo para guardar los cursos en la base de datos
    public function store(Request $request)
    {
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
}
