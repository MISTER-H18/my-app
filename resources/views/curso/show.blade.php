@extends('loyouts.createCurso')
@section('title', 'Inicio')
@section('content')
    <title>Mi Proyecto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6be6f14cdc.js" crossorigin="anonymous"></script>

    </head>

    <body>
        <div class="min-h-full">

            <!-- Menú -->


            <main>
                <div class="container ml-auto mr-auto flex flex-wrap items-start mt-8">

                    <div class="w-full pl-2 pr-2 mb-4 mt-4">
                        <h1 class="text-3xl font-extrabold text-center"> Curso </h1>
                    </div>

                </div>

                <div class="container ml-auto mr-auto flex items-center justify-center">
                    <div class="w-full md:w-1/2">
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

                        <!-- Formulario -->
                        <form action="{{ route('curso.update') }}" enctype="multipart/form-data" method="POST"
                            class="bg-white px-8 pt-6 pb-8 mb-4">
                            @csrf
                            @foreach ($curso as $nCurso)
                                <!-- Nombre del curso -->
                                <div class="mb-4">
                                    <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                                        <div class="sm:col-span-4 justify-center">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nya">
                                                Nombres Curso </label>
                                            <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                type="text"
                                                value="{{ $nCurso->course_name }}" name="NomCurso" required>
                                        </div>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            type="hidden" value="{{ $nCurso->id }}" name="id" hidden required>
                                        <div class="sm:col-span-4 justify-center">
                                            <label class="block text-gray-700 text-sm font-bold mb-2"> Docente </label>
                                            <select
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="NomDocente" placeholder="Encargado Curso" name="id_docente" required>
                                                @foreach ($docentes as $item)
                                                    <option value={{ $item->id }}>{{ $item->name }}
                                                        {{ $item->last_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                                        <div class="sm:col-span-4 justify-center mt-2">
                                            <label class="block text-gray-700 text-sm font-bold mb-2" for="nya"> Fecha
                                                Inicio </label>
                                            <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="nya" value="{{ $nCurso->start_date }}" type="date"
                                                name="InCurso" required>
                                            </input>
                                        </div>
                                        <div class="sm:col-span-4 justify-center">
                                            <label class="block text-gray-700 mt-2 text-sm font-bold mb-2"> Fecha de
                                                culminación
                                            </label>
                                            <input
                                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="NomDocente" value="{{ $nCurso->end_date }}" type="date"
                                                name="FinCurso" required>
                                            </input>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje"> Descripción
                                    </label>
                                    <input
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="mensaje" value="{{ $nCurso->description }}" name="description" rows="5"
                                        placeholder="El mensaje" required>
                                    </input>
                                </div>
                                <div class="sm:col-span-4 text-center justify-center">
                                    <label class="block text-gray-700 text-sm font-bold mb-2"> Imagen </label>
                                    <img alt="" src="/img/{{ $nCurso->image }}"
                                        style="width: 200px; height: 200px; text-align: center; margin: auto;"
                                        class="inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50" />
                                </div>
                                <input class="p-2" type="checkbox" name="cambiar_contenido" id="cambiar_contenido"
                                    value="1">
                                Cambiar Foto
                                <div class="p-4" id="contenido_dinamico">
                                    <div class="flex items-center p-2 justify-between">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            type="submit"> Aceptar </button>
                                        <a href="{{ route('curso.cursoCrud') }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Cancelar</a>
                                    </div>
                                </div>
                        </form>
                        @endforeach
                    </div>

                </div>

            </main>

        </div>

        <!-- Footer -->
        <footer class="footer-1 bg-gray-100 py-8 sm:py-12 text-center">
            <div class="container mx-auto">
                <p>©Mi Proyecto
                    <script>
                        document.write(new Date().getFullYear())
                    </script>. Todos los derechos reservados.
                </p>
            </div>
        </footer>

        <div class="pccp mt-2" align="center">


            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2390065838671224"
                data-ad-slot="1441100372" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
                const checkbox = document.getElementById('cambiar_contenido');
                const contenidoDinamico = document.getElementById('contenido_dinamico');

                checkbox.addEventListener('change', function() {
                    if (checkbox.checked) {
                        contenidoDinamico.innerHTML = `
                        <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="featured" 
                                    type="file" 
                                    accept=".jpg,.jpeg,.png" 
                                    name="featured" 
                                    required>
                                    <div class="flex items-center p-2 justify-between">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit"> Aceptar </button>
                                    <a href="{{ route('curso.cursoCrud') }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Cancelar</a>
                                </div>
                        `;
                    } else {
                        contenidoDinamico.innerHTML = `
                        <div class="flex items-center p-2 justify-between">
                                        <button
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                            type="submit"> Aceptar </button>
                                        <a href="{{ route('curso.cursoCrud') }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                            Cancelar</a>
                                    </div>
                        `;
                    }
                });

                const numericInputs = document.querySelectorAll("[inputmode='numeric']");

                const textInputs = document.querySelectorAll("[inputmode='text']");

                numericInputs.forEach((input) => {
                    validateInput(input);
                });

                function validateInput(el) {
                    el.addEventListener("beforeinput", function(e) {
                        let beforeValue = el.value;
                        e.target.addEventListener(
                            "input",
                            function() {
                                if (el.validity.patternMismatch) {
                                    el.value = beforeValue;
                                }
                            }, {
                                once: true
                            }
                        );
                    });
                }
            </script>
        </div>

    </body>

@endsection
