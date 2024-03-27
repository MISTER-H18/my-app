<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid w-full flex grid-cols-1 gap-20 mx-auto lg:grid-cols-3 -m-2">
                <a href="#"
                    class=" relative block shadow-2xl overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-4">
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
                            <h2 class="text-gray-900 text-lg title-font font-medium">Total Usuarios</h2>
                        </div>
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    @foreach ($totalUser as $total)
                        <div class="flex-grow">
                            <p class="text-2xl font-medium text-gray-900">{{ $total->total }} usuario registrados
                            </p>
                        </div>
                    @endforeach
                </a>
                <a href="#"
                    class="relative block overflow-hidden shadow-2xl rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-4">
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
                            <h2 class="text-gray-900 text-lg title-font font-medium">Cursos</h2>
                        </div>
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    @foreach ($totalCourse as $course)
                        <div class="flex-grow">
                            <p class="text-2xl font-medium text-gray-900">{{ $course->total }} Cursos registrados
                            </p>
                        </div>
                    @endforeach
                </a>
                <a href="#"
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
                            <h2 class="text-gray-900 text-lg title-font font-medium">Eventos</h2>
                        </div>
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    @foreach ($totalEvents as $events)
                        <div class="flex-grow">
                            <p class="text-2xl font-medium text-gray-900">{{ $events->total }} Eventos registrados
                            </p>
                        </div> 
                    @endforeach
                </a>

            </div>
        </div>
    </section>
    <div class="w-1/2 h-1/3 border border-black border-x-10 border-y-10 bg-white p-4 mx-auto shadow-2xl ">
        <div class="text-center bg-gray-200 p-4 ">
            <h1 class="text-gray-900 text-lg title-font font-medium">Distribución de usuarios por género</h1>
        </div>
        <canvas id="myChart"></canvas>
    </div>



    <article class="flex mx-auto p-10 transition hover:shadow-xl container flex items-center">
        <div class="p-2 hidden sm:block sm:basis-40 absolute  ">
            <img style="width: 200px; height: 200px;" alt="" src="/img/mcgee-records-sm3-251x300.jpg"
                class="rounded-full h-full w-full object-cover" />
        </div>
        <div class=" bg-white justify-between max-w-1000" style="margin-left: 160px; width: 85%;">
            <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6" style="margin-left: 30px;">
                <h2 class="text-gray-900 text-lg title-font font-medium ">
                    J Vernon McGee 1904-1988
                </h2>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-xl text-gray-700"style="margin-left: 30px;">
                    "La oración no es rogarle a Dios que cambie las circunstancias, sino pedirle que te cambie a ti para
                    que puedas enfrentar las circunstancias."
                </p>
            </div>
        </div>
    </article>


</x-app-layout>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var cData = JSON.parse(`<?php echo $data; ?>`);

    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Total usuarios', 'Masculino', 'Femeninos'],
            datasets: [{
                label: 'Usuarios',
                data: cData.comparacion,
                borderWidth: 1
            }]
        },
    });
</script>
