@extends('loyouts.crud')

@section('content')
    <div class="container mx-auto px-10">
        <form method="GET" action="" accept-charset="UTF-8">
            <div class="flex md:flex-row flex-col justify-between">
                <div class="flex flex-row items-center justify-start my-4 mx-2">
                    <p class="text-nowrap whitespace-nowrap text-gray-900 text-left text-base mr-3">
                        {{ __('Show') }}:
                    </p>

                    <select
                        class="block mt-1 w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm"
                        name="perPage" value="{{ request('perPage') }}" autofocus>
                        <x-option name="perPage" value="5">5</x-option>
                        <x-option name="perPage" value="10">10</x-option>
                        <x-option name="perPage" value="15">15</x-option>
                        <x-option name="perPage" value="20">20</x-option>
                    </select>
                </div>

                <div class="block my-4">
                    <div class="min-w-96 relative mt-2 rounded-md shadow-sm">
                        <input type="text" name="search" value="{{ request('search') }}" inputmode="text"
                            pattern="[A-Za-z0-9 ^,&]+" placeholder="Ingrese el valor del campo deseado"
                            class="block w-full border-sky-300 focus:border-orange-500 focus:ring-orange-500 rounded-md shadow-sm">

                        <div class="absolute inset-y-0 right-0 flex items-center">
                            <button type="submit"
                                class="h-full w-20 inline-flex items-center justify-center bg-sky-500 border border-transparent rounded-r-md text-xs text-white uppercase hover:bg-sky-600 focus:bg-sky-600 active:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Search') }}
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </form>

        <div class="overflow-x-auto">
            <div class="container mx-auto ">
                @if (session('success'))
                    <div class="bg-green-400 flex justify-center items-center">
                        <p class="text-2xl font-medium text-gray-900 font-style-italic text-white">
                            {{ session('success') }}
                        </p>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-400 flex justify-center items-center">
                        <p class="text-2xl font-medium text-gray-900 font-style-italic text-white ">
                            {{ session('error') }}
                        </p>
                    </div>
                @endif
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr class="bg-blue-500">
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Actividades </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Descripción</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Estado</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-white"></th>



                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 ">
                        @foreach ($curso as $nCurso)
                            <tr class="hover:bg-gray-200 cursor-pointer">
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <a class="group relative inline-block focus:outline-none focus:ring" href="#">
                                        <div class="bg-gradient-to-r from-blue-600 via-indigo-500 to-blue-700">
                                            <span
                                            class="absolute "></span>
                                            <span
                                            class="relative inline-block text-white border-2 border-current px-8 py-3 text-sm font-bold uppercase tracking-widest">
                                            {{ $nCurso->task }}
                                        </span>
                                    </div>
                                    </a>
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    {{ $nCurso->description }}
                                </th>
                                <form action="{{route('curso.updateEstadoActividad') }}" method="POST">
                                @csrf
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <input hidden type="hidden" value="{{$nCurso->id}}" name="id"/>
                                    <select
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="tipo" required>
                                    @if ($nCurso->estado == 1)
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    @else
                                        <option value="0">Inactivo</option>
                                        <option value="1">Activo</option>
                                    @endif
                                </select>
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <button class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium text-white hover:bg-indigo-700" type="submit" ><i class="fa-regular fa-floppy-disk"></i></button>
                                </form>
                                    <a href="http://127.0.0.1:8000/curso/actividades/crud/update/{{ $nCurso->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium text-white hover:bg-indigo-700">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </a>
                                    <a href="http://127.0.0.1:8000/curso/actividades/crud/destroy/{{ $nCurso->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium hover:bg-indigo-700">
                                        <i class="fa-solid fa-eraser"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="flex p-4">
            <a href="http://127.0.0.1:8000/curso/actividades/crud/create/{{$id}}"
                class="inline-block rounded bg-indigo-600 ml-auto px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Añadir
            </a>
            <div class="p-4"></div>
            <a href="{{ route('dashboard') }}"
                class="inline-block rounded bg-indigo-600 p-4 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                Salir
            </a>
        </div>
        <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
    </div>
@endsection 
