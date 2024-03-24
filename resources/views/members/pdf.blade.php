<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reporte</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div
        style="
        width: 21.59cm; /* Ancho de la hoja carta */
        height: 27.94cm; /* Alto de la hoja carta */">
        <header class="clearfix">
            <div style="width: 85%" id="logo">
                <img src="/application-logos/migratepc-mark.png">
            </div>
            <h1 style="width: 85%">Datos usuario</h1>
            <div style="width: 85%">
                <div id="company" class="clearfix">
                    <div>MIGRATEPC</div>
                    <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                    <div>(602) 519-0450</div>
                    <div><a href="migratepc@hotmail.com">migratepc@hotmail.com</a></div>
                </div>
                <div id="project">
                    <div><span>Proyecto</span> Gestion de activ</div>
                    <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
                    <div><span>EMAIL</span> <a href="migratepc@hotmail.com">migratepc@hotmail.com</a></div>
                    <div><span>DATE</span> August 17, 2015</div>
                    <div><span>DUE DATE</span> September 17, 2015</div>
                </div>
            </div>
        </header>
        @foreach ($users as $nUser)
        <h1 style="width: 85%"> Perfil de datos: {{$nUser->name}} {{$nUser->last_name}}</h1>
        <div class="text-gray-700 font-normal">
        </div>
        <div style="width: 85%">
            <div id="company" class="clearfix">
                <div>MIGRATEPC</div>
                <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                <div>(602) 519-0450</div>
            </div>
            <div id="project">
                <div><span>C.I:</span>{{ $nUser->identity_card }}</div>
                <div><span>EMAIL:</span> <a href=" {{ $nUser->email }}"> {{ $nUser->email }}</a></div>
                <div><span>Numero Tfl:</span>{{$nUser->phone_number}}</div>
                <div><span>Ocupación</span> {{$nUser->occupation}}</div>
                <div><span>Ubicación</span> {{$nUser->address}}</div>
                <div><span>Fecha de nacimiento</span> {{$nUser->date_of_birth}}</div>
            </div>
        </div>

        @endforeach
    </div>
</body>

</html>
