@extends('loyouts.crud')

@section('content')
    <div class="container mx-auto px-20">
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
            <div class="container mx-auto">
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
                            <p class="font-bold uppercase font-weight-bold ">
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Eventos</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Fecha de inicio</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Fecha de culminacion</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Descripción</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Estado</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white"></th>
                            </p>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 ">
                        @foreach ($event as $nEvent)
                            <tr class="hover:bg-gray-200 cursor-pointer">
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->event }} </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->start_date }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->end_date }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->description }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">                                   
                                    <select id="Opciones">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <a href="http://127.0.0.1:8000/event/Editar/{{ $nEvent->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </a>
                                    <a href="http://127.0.0.1:8000/event/Eliminar/{{ $nEvent->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium hover:bg-indigo-700">
                                        <i class="fa-solid fa-eraser"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex ">
                    <a href="{{ route('event.eventCreate') }}"
                        class="inline-block rounded bg-indigo-600 ml-auto px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Añadir
                    </a>
                    <div class="p-4"></div>
                    <a href="{{ route('dashboard') }}"
                        class="inline-block rounded bg-indigo-600 p-4 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                        Salir
                    </a>
                </div>
            </div>
        </div>
        <div></div>
        <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
    </div>
@endsection
