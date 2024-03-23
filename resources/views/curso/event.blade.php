@extends('loyouts.event')

@section('content')
<div id='calendar' class=""></div>
<div class="flex items-center justify-between px-4">
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit"> "cambiar por icono de configuracion" </button>
  <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit"> Cancelar</button>
</div>
<!-- Footer --> 
<footer class="footer-1 bg-gray-100 py-8 sm:py-12 text-center">
  <div class="container mx-auto">
    <p>©Mi Proyecto <script>document.write(new Date().getFullYear())</script>. Todos los derechos reservados.</p>        
  </div>
</footer>

<div class="pccp mt-2" align = "center">
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
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
        });
        calendar.render();
      });
    </script>
@endpush