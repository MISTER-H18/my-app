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
                        <h1 class="text-3xl font-extrabold text-center"> Evento </h1>
                    </div>

                </div>

                <div class="container ml-auto mr-auto flex items-center justify-center">
                    <div class="w-full md:w-1/2">

                        <!-- Formulario -->
                        <form action="{{ route('event.store') }}" method="POST" class="bg-white px-8 pt-6 pb-8 mb-4">
                            @csrf
                            <div class="mb-4">
                                <div class="grid grid-flow-row sm:grid-flow-col gap-3">
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="nya"> N.
                                            Evento</label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            id="nya" 
                                            type="text" 
                                            placeholder="Misa" 
                                            inputmode="text"
                                            maxlength="50"
                                            name="name_event"
                                            required>
                                    </div>
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email"> F. Inicio
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            type="date" 
                                            name="start_date" 
                                            required>
                                    </div>
                                    <div class="sm:col-span-4 justify-center">
                                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">F.
                                            Culminación
                                        </label>
                                        <input
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            type="date" 
                                            name="end_date" 
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje"> Descripción
                                </label>
                                <textarea
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="mensaje" 
                                    rows="5" 
                                    inputmode="text" 
                                    pattern="^([a-zA-Z0-9_\-\. ]{1,255})$" 
                                    maxlength="500" 
                                    minlength="10"
                                    placeholder="El mensaje" 
                                    name="description"
                                    required></textarea>
                            </div>
                            <div class="flex items-center justify-between">
                                <button
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit"> Aceptar </button>
                                <a href="{{ route('event.EventCrud') }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                    type="submit">
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
            <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
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
