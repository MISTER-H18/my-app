@extends('loyouts.crud')

@section('content')
    <div>
        <div class="overflow-x-auto">
            <div class="container mx-auto px-4 py-4">
                @if (session('status'))
                    <div class="">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="">
                        {{ session('error') }}
                    </div>
                @endif
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr class="bg-blue-500">
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Course</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">teacher</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">descripcion</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">F. Inicio</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">F. Culminacion</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Estado</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white"></th>

                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 ">
                        @foreach ($curso as $nCurso)
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nCurso->course_name }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nCurso->name }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    {{ $nCurso->description }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nCurso->start_date }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nCurso->end_date }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <input list="Opciones">
                                    <datalist id="Opciones">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </datalist>
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <a href="http://127.0.0.1:8000/curso/Editar/{{ $nCurso->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium text-white hover:bg-indigo-700">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </a>
                                    <a href="http://127.0.0.1:8000/curso/Eliminar/{{ $nCurso->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium hover:bg-indigo-700">
                                        <i class="fa-solid fa-eraser"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ route('curso.create') }}"
                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                    <i class="fa-solid fa-plus"></i>
                </a>
                <a href="{{ route('curso.index') }}"
                    class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                    <i class="fa-solid fa-door-open"></i>
                </a>
            </div>
        </div>
        <div>

        </div>
        <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
    </div>
@endsection
