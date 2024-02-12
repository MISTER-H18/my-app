@extends('loyouts.crud')

@section('content')
<div class="container">
    <div>
        <div class="container mx-auto px-4 py-4">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-400 px-4 py-2 text-gray-900 ">Course</th>
                        <th class="border border-gray-400 px-4 py-2 text-gray-900 ">teacher</th>
                        <th class="border border-gray-400 px-4 py-2 text-gray-900 ">descripcion</th>
                        <th class="border border-gray-400"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($curso as $nCurso)
                    
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">{{$nCurso->course_name}} </th>
                        <td class="border border-gray-400 px-4 py-2">{{$nCurso->teacher_id}}</td>
                        <td class="border border-gray-400 ">
                            <td class="border border-gray-400">
                                <a href="#"><i class="px-4 py-2 focus:outline-black">"edita"</i></a>
                                <a href="#"><i class="focus:outline-black">eliminar</i></a>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div></div>
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
</div>
@endsection