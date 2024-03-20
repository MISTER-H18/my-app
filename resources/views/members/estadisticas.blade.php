@extends('loyouts.crud')

@section('content')
    <div class="py-24 sm:py-32 bg-gradient-to-r from-blue-600 via-indigo-500 to-blue-700">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
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
                    <div class="mx-auto max-w-2xl lg:mx-0">
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Estadística para la toma de decisiones</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-900">Análisis de datos: La herramienta esencial para el éxito </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
        <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-2">

            <div style="width: 500px; height: 300px;"
                class="w-1/2 m-6 h-1/3 border border-black border-x-10 border-y-10 bg-white p-4  shadow-2xl ">
                <div class="text-center bg-gray-200 p-2 ">
                    <h1 class="text-gray-900 text-lg title-font font-medium">Distribución de usuarios por edad</h1>
                </div>
                <canvas id="goodCanvas1"></canvas>
            </div>

            <div style="width: auto; height: 300px;"
                class="w-1/2 h-1/3 m-6 border border-black border-x-10 border-y-10 bg-white p-4  shadow-2xl ">
                <div class="text-center bg-gray-200 p-2 ">
                    <h1 class="text-gray-900 text-lg title-font font-medium">Distribución de usuarios por profesion</h1>
                </div>
                <canvas id="goodCanvas2"></canvas>
            </div>
        </div>
    </div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var cDataA = JSON.parse(`<?php echo $edades; ?>`);
var cDataB = JSON.parse(`<?php echo $profesiones; ?>`);
var cDataC = JSON.parse(`<?php echo $dataP; ?>`);
console.log(cDataC);


    window.addEventListener('DOMContentLoaded', () => { // Espera a que el DOM esté listo
        const ctx = document.getElementById('goodCanvas1');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['0-13', '14-24', '25-34', '35 o mas'],
                datasets: [{
                    label: 'Usuarios',
                    data: cDataA.comparacionB,
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
                labels: cDataC.comparacion,
                datasets: [{
                    label: 'Usuarios',
                    data: cDataB.comparacionA,
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
