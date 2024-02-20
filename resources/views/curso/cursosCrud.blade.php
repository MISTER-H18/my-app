@extends('loyouts.crud')

@section('content')
<div>
  <div class="overflow-x-auto">
    <div class="container mx-auto px-4 py-4">
          @if (session("status"))
              <div class="">
                {{session( "status")}}
              </div>
          @endif
          @if (session("error"))
              <div class="">
                {{session( "error")}}
              </div>
          @endif
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead  class="ltr:text-left rtl:text-right">
                    <tr class="bg-gray-200">
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Course</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">teacher</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">descripcion</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    @foreach ($curso as $nCurso)
                    
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$nCurso->course_name}} </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$nCurso->teacher_id}}</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At quod</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                <a
            href="{{ route(  'curso.show',$nCurso->course_name ) }}"
            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
          >
            editar
          </a>
          <a
            href="#"
            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
          >
            Eliminar
          </a>
                            </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route( 'curso.create' ) }}" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Añadir 
          </a>
            <a
            href="{{ route( 'curso.index' ) }}"
            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline"
          >
            Salir
          </a>
        </div>
    </div>
    <div>
        
    </div>
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
</div>
@endsection
