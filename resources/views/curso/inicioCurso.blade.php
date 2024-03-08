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
                        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Cursos</h2>
                        <p class="mt-2 text-lg leading-8 text-gray-900">Bienvenido a nuestra página de cursos.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section>
        <div class="relative items-center w-full px-5 py-12 mx-auto md:px-12 lg:px-24 max-w-7xl">
            <div class="grid w-full grid-cols-1 gap-6 mx-auto lg:grid-cols-3">
                @foreach ($curso as $nCurso)
                    <div class="p-6">
                        <a href="#" class="group relative block bg-black">
                            <img alt=""
                                src="/img/{{$nCurso->image}}"
                                class="absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                            <div class="relative p-4 sm:p-6 lg:p-8">
                                <p class="text-sm font-medium uppercase tracking-widest text-pink-500">{{ $nCurso->course_name }}
                                </p>
                                <p class="text-xl font-bold text-white sm:text-2xl">Desde: {{$nCurso->start_date}} </p>
                                <p class="text-xl font-bold text-white sm:text-2xl">Hasta: {{$nCurso->end_date}} </p>
                                <p class="text-xl font-bold text-white sm:text-2xl">{{ $nCurso->name }} {{$nCurso->last_name}} </th>
                                </p>

                                <div class="mt-32 sm:mt-48 lg:mt-64">
                                    <div
                                        class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                        <p class="text-sm text-white">
                                            {{$nCurso->description}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </section>
    <a href="{{ route('curso.create') }}"
        class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700 focus:outline-none focus:shadow-outline">Añadir
    </a>
    </div>
    </div>
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>

    </div>
@endsection
