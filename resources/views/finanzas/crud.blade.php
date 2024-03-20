@extends('loyouts.crud')

@section('content')
    <div class="container mx-auto px-20">
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid w-full flex grid-cols-1 gap-20 mx-auto lg:grid-cols-3 -m-2">
                <div class=" relative block shadow-2xl overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-4">
                    <span
                        class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
                    <div class="sm:flex sm:justify-between sm:gap-6">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Total registros</h2>
                        </div>
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    @foreach ($transactionMes as $nTransactiontotal)
                        <div class="flex-grow">
                            <p class="text-2xl font-medium text-gray-900">{{ $nTransactiontotal->total_registros }}
                                Registros en el mes.
                            </p>
                        </div>
                    @endforeach
                </div>
                <div class="relative block overflow-hidden shadow-2xl rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-4">
                    <span
                        class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
                    <div class="sm:flex sm:justify-between sm:gap-4">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Total Egreso en el mes</h2>
                        </div>
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    @foreach ($totalIngresoMes as $tIngreso)
                        <div class="flex-grow">
                            <p class="text-2xl font-medium text-gray-900">{{ $tIngreso->total_monto }} Bs.
                            </p>
                        </div>
                    @endforeach
                </div>
                <div href="#"
                    class="relative block overflow-hidden shadow-2xl rounded-lg border border-gray-100 p-4 sm:p-3 lg:p-4">
                    <span
                        class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
                    <div class="sm:flex sm:justify-between sm:gap-4">
                        <div class="flex items-center mb-3">
                            <div
                                class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                    <circle cx="6" cy="6" r="3"></circle>
                                    <circle cx="6" cy="18" r="3"></circle>
                                    <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                                </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Total de Ingreso en el mes</h2>
                        </div>
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    @foreach ($totalEgresoMes as $egresoT)
                        <div class="flex-grow justify-center">
                            <p class="text-2xl font-medium text-gray-900">{{ $egresoT->total_monto }} Bs.
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
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
                <table class="min-w-full table-auto divide-y-2 divide-gray-200 bg-white text-sm">
                    <thead class="ltr:text-left rtl:text-right">
                        <tr class="bg-blue-500 ">
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">Fecha</th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">Monto</th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">Descripcion</th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">Tipo</th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">Por</th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 ">
                        @foreach ($transaction as $nTransaction)
                            <tr class="hover:bg-gray-200 cursor-pointer">
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nTransaction->fecha }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    {{ $nTransaction->monto }} Bs.</th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    {{ $nTransaction->descripcion }}
                                </th>
                                <th>
                                    <div
                                        class="group inline-block rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:outline-none focus:ring active:text-opacity-75">
                                        <span
                                            class="block rounded-full bg-white px-8 py-3 text-sm font-medium group-hover:bg-transparent">
                                            @if ($nTransaction->tipo == 1)
                                                Egreso
                                            @else
                                                Ingreso
                                            @endif
                                        </span>
                                    </div>
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">{{ $nTransaction->name }}
                                    {{ $nTransaction->last_name }}
                                </th>
                                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                    <a href="http://127.0.0.1:8000/finanza/Editar/{{ $nTransaction->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium text-white hover:bg-indigo-700">
                                        <i class="fa-solid fa-pen-nib"></i>
                                    </a>
                                    <a href="http://127.0.0.1:8000/finanza/Eliminar/{{ $nTransaction->id }}"
                                        class="inline-block rounded bg-indigo-600 px-4 py-2 font-medium hover:bg-indigo-700">
                                        <i class="fa-solid fa-eraser"></i>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        <tr class="bg-blue-500">
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">Total</th>
                            @foreach ($transaccionTotal as  $tTotales)
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white">{{$tTotales->total_monto}} Bs.</th>
                            @endforeach
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white"></th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white"></th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white"></th>
                            <th class="whitespace-nowrap px-4 py-2 font-weight-bold font-medium text-white"></th>
                        </tr>
                    </tbody>
                </table>
                <div class="flex p-4">
                    <a href="{{ route('finanza.create') }}"
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
        <div>

        </div>
        <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
    </div>
    <div class="relative items-center  w-full mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-2">

            <div style="width: 500px; height: 300px;"
                class="w-1/2 m-6 h-1/3 border border-black border-x-10 border-y-10 bg-white p-4  shadow-2xl ">
                <div class="text-center  bg-gray-200 p-2 ">
                    <h1 class="text-gray-900 text-lg title-font font-medium">Registros ingresos meses anteriores.</h1>
                </div>
                <canvas id="goodCanvas1"></canvas>
            </div>

            <div style="width: auto; height: 300px;"
                class="w-1/2 h-1/3 m-6 border border-black border-x-10 border-y-10 bg-white p-4  shadow-2xl ">
                <div class="text-center bg-gray-200 p-2 ">
                    <h1 class="text-gray-900 text-lg title-font font-medium">Registros egresos meses anteriores.</h1>
                </div>
                <canvas id="goodCanvas2"></canvas>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var cDataA = JSON.parse(`<?php echo $dataP; ?>`);
    var cDataB = JSON.parse(`<?php echo $data; ?>`);

    window.addEventListener('DOMContentLoaded', () => { // Espera a que el DOM esté listo
        const ctx = document.getElementById('goodCanvas1');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cDataA.mes,
                datasets: [{
                    label: 'Monto(Bs.)',
                    data: cDataA.comparacion,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });

    window.addEventListener('DOMContentLoaded', () => { // Espera a que el DOM esté listo
        const ctx = document.getElementById('goodCanvas2');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: cDataB.mes,
                datasets: [{
                    label: 'Monto(Bs.)',
                    data: cDataB.comparacion,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
