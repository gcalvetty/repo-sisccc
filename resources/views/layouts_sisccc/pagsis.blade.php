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

        @if((Route::current()->getName() == 'rude-d.edit')or
        (Route::current()->getName() == 'rude-ins.edit')or
        (Route::current()->getName() == 'rude-s.edit'))
        @include('layouts_sisccc.partials.pagsis_edit_css')
        @endif        

        <link href="/dist/css/AdminLTE.css" rel="stylesheet">          
        <link href="/dist/css/skins/_all-skins.css" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>
    <body class="sidebar-mini skin-green wysihtml5-supported"> 
        <div class="wrapper">
            @if (Auth::guest())       		
            @else     
            {!! Html::menuccc() !!}
            @endif
            @yield('sis_menu_lateral')
            @yield('sis_contenido')
            @yield('menu-configuracion')
        </div>
        <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=tjcHah7sB34YguDSZ8X4JxpC77rb3bQ4P8C4ujVW6W4G62t3N98vnkXKWzs6"></script></span>
        <!-- jQuery 3.1.1 -->
        <script src="/jquery/jquery-3.1.1.min.js"></script>    
        <!-- jQuery UI 1.11.4 -->
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

        <!-- DataTables -->
        <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="/plugins/fastclick/fastclick.js"></script>

        <!-- Bootstrap 3.3.6 -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/dist/js/app.min.js"></script>
        <script src="/dist/js/ccc-escritorio.js"></script>


        <script>
            $(function () {
                $("#example1").DataTable();
                $('#example2').DataTable();
            });
        </script>
         @if((Route::current()->getName() == 'Dir.Reg')||
             (Route::current()->getName() == 'Admtr.alumnos')||
             (Route::current()->getName() == 'Admtr.listalumnos')
             )
        <script>
            $('#exampleModal20').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var alum = button.data('alumno');
                var usu = button.data('usuario');
                var modal = $(this);                
                modal.find('.modal-title').text('Login del Alumno: ' + alum);
                modal.find('.modal-usu').text(' '+usu);
            })
            $('#exampleModal21').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var alum = button.data('alumno');
                var id = button.data('id');
                var modal = $(this);                
                modal.find('.modal-title').text('Login del Alumno: ' + alum);
                modal.find('.modal-id').text(' '+id);
            })
        </script>
        @endif

        @if((Route::current()->getName() == 'rude-d.edit')or 
        (Route::current()->getName() == 'rude-ins.edit')or
        (Route::current()->getName() == 'rude-s.edit'))
        @include('layouts_sisccc.partials.pagsis_edit_js')
        @endif               
        @if((Route::current()->getName() == 'Admtr.Reg'))             
        @include('layouts_sisccc.partials.pagsis_charts_js',['some' => 'data'])            
        @endif
    </body>