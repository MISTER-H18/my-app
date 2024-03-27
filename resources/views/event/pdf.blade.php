<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Reporte</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" 
    rel="stylesheet" />
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
            <h1 style="width: 85%">Resumen de eventos activos</h1>
            <div style="width: 85%">
                <div id="company" class="clearfix">
                    <div>MIGRATEPC</div>
                    <div>455 Foggy Heights,<br /> AZ 85004, US</div>
                    <div>(602) 519-0450</div>
                    <div><a href="migratepc@hotmail.com">migratepc@hotmail.com</a></div>
                </div>
                <div id="project">
                    <div><span>Proyecto</span> Gestion de activ</div>>
                    <div><span>ADDRESS</span> 796 Silver Harbour, TX 79273, US</div>
                    <div><span>EMAIL</span> <a href="migratepc@hotmail.com">migratepc@hotmail.com</a></div>
                    <div><span>DATE</span> August 17, 2015</div>
                    <div><span>DUE DATE</span> September 17, 2015</div>
                </div>
            </div>
        </header>
        <p style="width: 85%">  Este reporte presenta un resumen de los eventos próximos activos de la organización, incluyendo información sobre:</p>
        <main>
            <table style="width: 85%">
                <thead>
                    <tr>
                        <th class="service">Fecha</th>
                        <th class="desc">Descripcion</th>
                        <th class="desc">Encargado</th>
                        <th class="">Duracion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $nEvents)
                        <tr>
                            <td class="service">{{ $nEvents->event }}</td>
                            <td class="desc">{{ $nEvents->description }}</td>
                            <td class="desc">{{ $nEvents->encargado_name}} {{ $nEvents->nombre}}</td>
                            <td class="qty">{{ $nEvents->start_date }} - {{ $nEvents->end_date }}</td>
                        </tr>
                    @endforeach
                    <tr>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</body>
</html>
