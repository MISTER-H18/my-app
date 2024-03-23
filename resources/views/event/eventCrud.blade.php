@extends('loyouts.crud')

@section('content')
<div>
    <div class="overflow-x-auto">
        <div class="container mx-auto px-4 py-4">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                <thead  class="ltr:text-left rtl:text-right">
                    <tr class="bg-gray-200">
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">event</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Fecha de inicio</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Fecha de culminacion</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">descripcion</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 ">
                    @foreach ($event as $nEvent)
                    
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$nEvent->event}} </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$nEvent->start_date}}</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{$nEvent->end_date}}</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">Lorem ipsum dolor sit, amet consectetur adipisicing elit. At quod</th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                <a
            href="#"
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
            <div class="flex items-center justify-between">
            <a href="#" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Salir </a>
            <a href="#" class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Añadir </a>
            </div>
        </div>
    </div>
    <div></div>
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
</div>
@endsection