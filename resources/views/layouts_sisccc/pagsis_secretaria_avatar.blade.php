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

        <link href="/dist/css/AdminLTE.css" rel="stylesheet">          
        <link href="/dist/css/skins/_all-skins.css" rel="stylesheet">
        <!-- DataTables -->
        <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">

        <!--Croop -->
        <link rel="stylesheet" href="/jquery/croppie/croppie.css">
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
        <script src="{{ asset("js/app.js") }}" ></script> 
        <script src="{{ asset("js/app-tabla.js") }}" ></script> 
        
        <!-- Bootstrap 3.3.6 -->
        <script src="/bootstrap/js/bootstrap.min.js"></script>
        <script src="/dist/js/app.min.js"></script>
        <script>
            $(function () {
                   $('#example1').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });  
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true
                });                      
            });
        </script>
        @if((Route::current()->getName() == 'Secr.subAvatar'))
        <!-- Croop -->
        <script src="/jquery/croppie/croppie.js"></script>
        <script type="text/javascript">            
            var resize = $('#upload-demo').croppie({
                enableExif: true,
                enableOrientation: true,    
                viewport: { // Default { width: 100, height: 100, type: 'square' } 
                    width: 200,
                    height: 200,
                    type: 'circle' //square
                },
                boundary: {
                    width: 300,
                    height: 300
                },
                url: '<?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($idUsu, 300); ?>',
            });




            $('#image_file').on('change', function () { 
              var reader = new FileReader();
                reader.onload = function (e) {
                  resize.croppie('bind',{
                    url: e.target.result
                  }).then(function(){
                    $('#guardarBot').prop('disabled', false);
                    console.log('jQuery bind complete');
                  });
                }
                reader.readAsDataURL(this.files[0]);
            });
            $('.upload-image').on('click', function (ev) {
              resize.croppie('result', {
                type: 'canvas',
                size: 'viewport'
              }).then(function (img) {
                html = '<img src="' + img + '" />';
                $("#preview-crop-image").html(html);
                url="/secretaria/subir/avatar/guardar";                
                axios.post(url, {
                    idUsu: {{ $idUsu }},                    
                    imgAvatar:img,
                })
                .then(function (response) {
                    console.log(response);
                    toastr.success('Avatar Subido');
                    <?php
                        $url='';
                        switch($opc){
                            case 1: $url=Route('Secr.libreta');
                            break;                            
                            case 2: $url=Route('Secr.doc');
                            break;                            
                            case 3: $url=Route('Secr.Avatar');
                            break;                            
                        }
                    ?>
                    location.href = "<?php echo $url; ?>";
                    
                })
                .catch(function (error) {
                    console.log(error);
                    toastr.warning('Avatar Error');    
                });
              });
            });
            </script>
        @endif
    </body>