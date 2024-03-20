@extends('loyouts.event')

@section('content')
    <div id='calendar' class=""></div>
    <div class="flex items-center py-2 px-4 justify-between px-4">
        <a href="{{ route('event.EventCrud') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"> <i class="fa-solid fa-pen-nib"></i> </a>
        <a href="{{ route('dashboard') }}"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            type="submit"><i class="fa-solid fa-door-open"></i></a>
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



    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-2390065838671224" data-ad-slot="1441100372"
        data-ad-format="auto" data-full-width-responsive="true"></ins>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
    </script>
    </div>

    </body>
    <script src="https://kit.fontawesome.com/bf1e73e2b4.js" crossorigin="anonymous"></script>
@endsection
@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events), // your event source
                locale: 'es',
            });
            calendar.render();
        });
    </script>
@endpush
