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
        <link rel="stylesheet" href="{{ asset('paralax/style.css') }}">        
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>

    <body> 
        <div id="preloader">
            <i class="circle-preloader"></i>
        </div>        
        @if (Auth::guest())
            @yield('home_menu')
            @yield('home_contenido')            
        @else 
        <div class="home-cont2">                                  
            @component('layouts_sisccc.pag_home_logeado')
            @endcomponent
        </div>
        @endif
        @yield('home_footer')
        <!-- ##### All Javascript Script ##### -->        
        <script src="{{ asset('paralax/js/jquery/jquery-2.2.4.min.js') }}"></script>        
        <script src="{{ asset('paralax/js/bootstrap/popper.min.js')}}"></script>        
        <script src="{{ asset('paralax/js/bootstrap/bootstrap.min.js')}}"></script>        
        <script src="{{ asset('paralax/js/plugins/plugins.js')}}"></script>        
        <script src="{{ asset('paralax/js/active.js')}}"></script>
    </body>