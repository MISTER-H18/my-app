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
                        @foreach ($curso as $nCurso)
                            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">
                                {{ $nCurso->course_name }}
                            </h2>
                            <p class="mt-2 text-lg leading-8 text-gray-900">Bienvenido aqui encontrar material
                                relacionado
                                con el curso.</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="relative text-center items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="relative items-center w-full py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
                <div class="grid w-full flex grid-cols-1 gap-20 mx-auto lg:grid-cols-2 -m-2">
                    @foreach ($actividades as $nActividades)
                    <div
                    class=" relative block shadow-2xl overflow-hidden rounded-lg border border-gray-100 sm:p-6 lg:p-4">
                    <span
                    class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>
                    <div class="sm:flex sm:justify-between sm:gap-6">
                        <div class="hidden sm:block sm:shrink-0">
                        </div>
                    </div>
                    <div class="flex-grow">
                        <p class="text-2xl font-medium text-gray-900">{{ $nActividades->task }}</p>
                        <p class="text-2xl text-gray-900">{{ $nActividades->description }}</p>

                                <a href="/file/{{$nActividades->ruta}}" 
                                    download="{{$nActividades->ruta}}"
                                class="group inline-block rounded-full bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 p-[2px] hover:text-white focus:outline-none focus:ring active:text-opacity-75"
                                    href="#">
                                    <span
                                        class="block rounded-full bg-white px-4 py-2 text-sm font-medium group-hover:bg-transparent">
                                        Descargar
                                    </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
