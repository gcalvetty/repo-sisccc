<!DOCTYPE html>
<html lang="es"><head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('favicon.ico') }}">
        <title>{{ config('app.name')}} | @yield('titulo')</title>        
        <!-- Favicon -->        
        <link rel="apple-touch-icon" sizes="76x76" href="/imagenes/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/imagenes/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/imagenes/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/imagenes/favicon/manifest.json">
        <link rel="mask-icon" href="/imagenes/favicon/safari-pinned-tab.svg">
        <meta name="msapplication-TileColor" content="#7cba5f">
        <meta name="theme-color" content="#7cba5f">
        <meta name="google-site-verification" content="TMCJ84VbGNP_H5cHT4uBHnMKj0lKeK0yYNPNw1wBgXU" />
        <!-- Styles -->

        <link href="{{ elixir('/css/app.css') }}" rel="stylesheet">
        <link href="{{ elixir('/css/sisccc.css') }}" rel="stylesheet"> 
        <link href="{{ elixir('/css/sisccc-rude.css') }}" rel="stylesheet"> 
                     

        <link href="/dist/css/AdminLTE.css" rel="stylesheet">          
        <link href="/dist/css/skins/_all-skins.css" rel="stylesheet">
        
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
        <style>
                .navbar-inverse { background-color: #008d4c; }
                .navbar-inverse .navbar-brand{ color:gold; }
                .nav > li > button { color:honeydew !important;   position: relative; display: block; padding: 3px 10px; margin: 8px 10px; }                
                .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus{background-color:mediumseagreen; color:gold; }
                /* ---- Pagina 1 ---- */
                
                /* ---- Pagina 2 ---- */
        </style>
    </head>
    <body> 

            @yield('sis_contenido')        
        

        <!-- jQuery 3.1.1 -->
        <script src="/jquery/jquery-3.1.1.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/dist/js/app.min.js"></script>        
        <script src="/jquery/vue.js" type="text/javascript"></script> 
        <script src="/jquery/toastr.js" type="text/javascript"></script>
          
        <script type="application/javascript">   
                /* ----- */   
                
                const app_imp= new Vue({
                    el: '#imprimir',                    
                    methods: {
                        imprimirRude:function(){                            
                            toastr.info('Listo para Imprimir'); 
                            window.print();
                        },                     
                    }
                });        
        </script>        
    </body>