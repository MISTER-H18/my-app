<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function index(){
        $curso=DB::select("SELECT * FROM courses");
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
        $curso=DB::select("SELECT * FROM courses");
        return view('curso\cursosCrud') ->with('curso',$curso);
    }
    //Metodo para guardar los cursos en la base de datos
    public function store(Request $request ){

    try {
        $sql=DB::insert( 'INSERT INTO courses (course_name, teacher_id,start_date,end_date,description, ) values(?,?,?;?)', [$request->NomCurso,$request->id_docente,$request->InCurso,$request->FinCurso,$request->description,]);
        $cursos=DB::select("SELECT * FROM courses");
    } catch (\Throwable $th) {
        //throw $th;
        $sql=0; 
    }
        if ($sql == true){
            return view('curso\cursosCrud' )-> with ('curso',$cursos);
        }else {
            return view('curso\cursosCrud')-> with('curso',$cursos);
    
        }
    }
}
