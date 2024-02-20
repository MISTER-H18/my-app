@extends('loyouts.createEvent')
@section('title',  'Inicio')
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
        <h1 class="text-3xl font-extrabold text-center"> Event </h1>
      </div>
      
    </div> 

    <div class="container ml-auto mr-auto flex items-center justify-center">
      <div class="w-full md:w-1/2">

        <!-- Formulario -->
        <form class="bg-white px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <div class="grid grid-flow-row sm:grid-flow-col gap-3">
              <div class="sm:col-span-4 justify-center">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="nya"> Nombres event</label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nya" type="text" placeholder="Carlos Torres" required>
              </div>
              <div class="sm:col-span-4 justify-center">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email"> start date </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="ctorres@mail.com" required>
              </div>
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="mensaje"> descripcion </label>
            <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="mensaje" rows="5" placeholder="El mensaje" required></textarea>
          </div>
          <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit"> Aceptar </button>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit"> Cancelar</button>
          </div>
        </form>              
      </div>

    </div> 

  </main>     
  
</div>


<!-- Footer --> 
<footer class="footer-1 bg-gray-100 py-8 sm:py-12 text-center">
  <div class="container mx-auto">
    <p>©Mi Proyecto <script>document.write(new Date().getFullYear())</script>. Todos los derechos reservados.</p>        
  </div>
</footer>

<div class="pccp mt-2" align="center">
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            
  <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-2390065838671224"
                 data-ad-slot="1441100372"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
  <script>
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
</div>

</body>
  
@endsection
