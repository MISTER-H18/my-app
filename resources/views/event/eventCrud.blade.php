@extends('loyouts.crud')

@section('content')
    <div>
        <div class="overflow-x-auto">
            <div class="container mx-auto px-4 py-4">
                <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr class="bg-blue-500">
                            <p class="font-bold uppercase text-white">
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Event</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Fecha de inicio</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Fecha de culminacion</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Descripcion</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white">Estado</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-white"></th>
                            </p>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 ">
                        @foreach ($event as $nEvent)
                            <tr>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->event }} </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->start_date }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->end_date }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nEvent->description }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <input list="Opciones">
                                    <datalist id="Opciones">
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </datalist>
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
                <div class="flex items-center justify-between">
                    <a href="{{ route('event.event') }}"
                        class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                        <i class="fa-solid fa-door-open"></i>
                    </a>
                    <a href="{{ route('event.eventCreate') }}"
                        class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
            </div>
        </div>
        <div></div>
        <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
    </div>
@endsection
