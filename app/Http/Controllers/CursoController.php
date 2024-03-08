<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index(){
        $curso=DB::select("SELECT users.name,users.last_name,courses.course_name, courses.teacher_id,date(courses.start_date)as start_date,date(courses.end_date)as end_date,courses.description,courses.image FROM users
        INNER JOIN user_roles ON user_roles.id = users.user_rol_id
        INNER JOIN courses ON courses.teacher_id = users.id
        WHERE user_roles.rol_name = 'Docente'");
        return view('curso\inicioCurso')-> with ('curso',$curso); 
    }
    public function create(){
        return view('curso\create');
    }
    public function destroy($id){
            $sqls=DB::delete(  "DELETE FROM courses WHERE id = $id");
            $cursos=DB::select("SELECT * FROM courses");
        if ($sqls == true){
            return view('curso\cursosCrud' )-> with ('curso',$cursos);
        }else {
            return view('curso\cursosCrud')-> with('curso',$cursos);
            
        }
        
    }
    public function show($id){
        $curso= DB::select("SELECT * FROM courses WHERE id = $id") ;
        return view('curso\show') ->with('curso',$curso);  
    }
    public function CursoCrud(){  
        $curso=DB::select("SELECT users.name,users.last_name,courses.id,courses.course_name, courses.teacher_id,date(courses.start_date)as start_date,date(courses.end_date)as end_date,courses.description,courses.image FROM users
        INNER JOIN user_roles ON user_roles.id = users.user_rol_id
        INNER JOIN courses ON courses.teacher_id = users.id
        WHERE user_roles.rol_name = 'Docente'");
        return view('curso\cursosCrud') ->with('curso',$curso);
    }
    //Metodo para guardar los cursos en la base de datos
    public function store(Request $request ){
        $destino = 'img/';// ruta donde se guardaran las imagenes

    try {
        $cursos=DB::select("SELECT * FROM courses");
        $sql=DB::insert( 'INSERT INTO courses (course_name, teacher_id,start_date,end_date,description,image ) values(?,?,?,?,?,?)', [$request->NomCurso,
        $request->id_docente,
        $request->InCurso,
        $request->FinCurso,
        $request->description,
        $p1 = $request->file('featured')->getClientOriginalName(),       
    ]);
    $a1 = time().$request->file('featured')->move( $destino , $p1);
    } catch (\Throwable $th) {
        //throw $th;
        $sql=0; 
    }
        if ($sql == true){
            return redirect()->route('curso\cursosCrud' );
        }else {
            return redirect()->route('curso\cursosCrud');
    
        }
    }
}
