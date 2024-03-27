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
            <!-- Menú -->


            <main>
                <div class="container ml-auto mr-auto flex flex-wrap items-start mt-8">

                    <div class="w-full pl-2 pr-2 mb-4 mt-4">
                        <h1 class="text-3xl font-extrabold text-center"> Curso </h1>
                    </div>

                </div>

                <div class="container ml-auto mr-auto flex items-center justify-center">
                    <div class="w-full md:w-1/2">

                        <!-- Formulario -->
                        <form action="{{ route('curso.store') }}" method="POST" class="bg-white px-8 pt-6 pb-8 mb-4"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Nombre del curso -->
                            <div class="mb-4">
                                <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nya"> Nombre
                                            Curso </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="nya" type="text" placeholder="Ejm Oratoria" inputmode="text"
                                            name="NomCurso" minlength="5" maxlength="20" required>
                                    </div>
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"> Docente </label>
                                        <select
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="NomDocente" placeholder="Encargado Curso" name="id_docente" required>
                                            <option>...</option>
                                            @foreach ($docentes as $item)
                                                <option value={{ $item->id }}>{{ $item->name }} {{ $item->last_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nya"> Fecha
                                            Inicio </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="nya" type="date" name="InCurso" required>
                                    </div>
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2"> Fecha de culminacion
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="NomDocente" type="date" name="FinCurso" required>
                                    </div>
                                </div>
                            </div>
                            <div class="sm:col-span-4 justify-center">
                                <label class="block text-gray-700 text-sm font-bold mb-2"> Imagen </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="featured" type="file" accept=".jpg,.jpeg,.png" name="featured" required>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje"> Descripción
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    name="description" id="mensaje" rows="5" placeholder="El mensaje" inputmode="text"
                                    pattern="^([a-zA-Z0-9_\-\. ]{1,255})$" minlength="10" maxlength="196" required></textarea>
                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit"> Aceptar </button>
                                <a href="{{ route('curso.cursoCrud') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <i class="fa-solid fa-door-open"></i>
                                </a>
                            </div>
                        </form>

                    </div>

                </div>

            </main>

        </div>

        <div class="pccp mt-2" align="center">

            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2390065838671224"
                data-ad-slot="1441100372" data-ad-format="auto" data-full-width-responsive="true"></ins>
            <script>
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
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>

@endsection
