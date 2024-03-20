@extends('loyouts.createEvent')
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
                        <h1 class="text-3xl font-extrabold text-center"> Movimiento </h1>
                    </div>
                </div>
                <div class="container ml-auto mr-auto flex items-center justify-center">
                    <div class="w-full md:w-1/2">
                        <!-- Formulario -->
                        <form action="{{ route('finanza.store') }}" method="POST" class="bg-white px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nya">
                                            Monto</label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="nya" inputmode="numeric" pattern="^([0-9]{1,10})(.[0-9]{1,2})?$"
                                            name="monto" type="number" required>
                                    </div>
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email"> Fecha de
                                            registro
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            name="fecha" type="date" required>
                                    </div>
                                </div>
                            </div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email"> Tipo
                            </label>
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="tipo" required>
                                <option value="0">Ingreso</option>
                                <option value="1">Egreso</option>
                            </select>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="email"> Usuario
                            </label>
                            <select
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                name="user_id" required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }} {{ $user->last_name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje"> Descripción
                                </label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="mensaje" rows="5" inputmode="text" pattern="^([a-zA-Z0-9_\-\. ]{1,255})$"
                                    name="description" placeholder="El mensaje" required>
                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit"> Aceptar
                                </button>

                                <a href="{{ route('finanza.create') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    <i class="">Salir</i>
                                </a>
                            </div>
                        </form>
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
