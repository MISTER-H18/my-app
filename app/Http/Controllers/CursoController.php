<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return view('curso\inicioCurso'); 
    }
    public function create(){
        return view('curso\create');
    }
    public function show($id){
        return view('curso\show',['id' => $id]);  //$id es una variable que se pasa por URL, y se muestra en la página  //Esta es una ruta dinámica, donde el id puede ser cualquier cosa    
    }
}
