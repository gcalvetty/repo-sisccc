<!DOCTYPE html>
<html lang="en">

    <head>
        <title>{{ config('app.name', 'CCC-SIS') }} | @yield('titulo')</title>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">            
        <meta charset="UTF-8">

        <link rel="icon" href="{{ asset('paralax/img/core-img/favicon.ico') }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('paralax/img/core-img/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('paralax/img/core-img/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('paralax/img/core-img/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('paralax/img/core-img/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('paralax/img/core-img/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('paralax/img/core-img/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('paralax/img/core-img/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('paralax/img/core-img/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('paralax/img/core-img/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('paralax/img/core-img/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('paralax/img/core-img/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('paralax/img/core-img/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('paralax/img/core-img/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('paralax/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('paralax/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="{{ asset('plugins/fullcalendar/fullcalendar.min.css') }}">      
        <link rel="stylesheet" href="{{ asset('paralax/style.css') }}">   
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}"  type="text/css"/>
        <style>.fc-day-number{ color: #adadad; }</style>
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>

    <body> 
        @yield('home_menu')
        @yield('home_contenido')
        @yield('home_footer')           

        <!-- jQuery 3.1.1 -->
        <script src="/jquery/jquery-3.1.1.min.js"></script>    
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>


        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="{{ asset('plugins/fullcalendar/moment.min.js') }}"></script>
        <script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('plugins/fullcalendar/locale-all.js') }}"></script>        
        <!-- Page specific script -->
        <script>
            $(function () {
            /* initialize the calendar
             -----------------------------------------------------------------*/
            //Date for the calendar events (dummy data)
            var date = new Date();
                    var initialLocaleCode = 'es';
                    $('#calendario').fullCalendar({
            header: {
            left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,basicDay'
            },
                    locale: initialLocaleCode,
                    buttonText: {
                    today: 'today',
                            month: 'month',
                            week: 'week',
                            day: 'day'
                    },
                    navLinks: false,
                    eventLimit: true,
                    events: [@yield('home_actividad')]
            })
            }
            );
        </script>
    </body>