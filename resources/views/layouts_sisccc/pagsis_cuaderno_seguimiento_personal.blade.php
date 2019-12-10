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
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Scripts -->

        <!-- datagrip -->
        <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css" >


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
        <script src="/dist/js/ccc-escritorio.js"></script>

        <!-- fullCalendar 2.2.5 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        
        <script src="/jquery/moment.js" type="text/javascript"></script>  
        <script src="/jquery/locale/es-fecha.js" type="text/javascript"></script>          
        
        <!-- TextArea -->
        <script src="/jquery/ckeditor/ckeditor.js"></script>
        <script src="/jquery/ckeditor/js/sample.js"></script>    
        
        <!-- Seguimiento + Paginacion -->
        <script>
                moment.locale('es');         
                const app1 = new Vue({
                    el: "#Cuad_Seguimiento",
                    created: function () {
                        this.getAct();
                    },                
                    data: {
                        listado: [],
                        paginacion :{
                            'total'    : 0,
                            'act_pag'  : 0,
                            'por_pag'  : 0,
                            'ult_pag'  : 0,
                            'de'       : 0,
                            'al'       : 0,
                            },
                        tar_desc: '',
                        fini: '',
                        editor: '',                    
                        errors: [],
                        offset: 3,
                        text: '',
                        contar: 0,
                    },
                    mounted: function () { //cuando se cargo la pagina

                    },
                    computed:{
                        isActived:function(){
                            return this.paginacion.act_pag;
                        },
                        pagesNumber: function(){
                            var pagesArray = [];
                            if(!this.paginacion.al){
                                return [];
                            }
                            // Desde
                            var from = this.paginacion.act_pag - this.offset;
                            if(from<1){
                                from = 1;
                            }
                            // Hasta
                            var to = from + (2 * this.offset);
                            if(to >= this.paginacion.ult_pag){
                                to = this.paginacion.ult_pag;
                            }
                            while(from <= to){
                                pagesArray.push(from) ;
                                from++;                           
                            }
                            return pagesArray;
                        },
                    },
                    methods: {                    
                        getAct: function (pag) {
                            var urlAct = "../cuaderno/mostrar?page="+pag+"&idPer="+<?php echo $PerAdm ?>;
                            axios.get(urlAct).then(response => {
                                this.listado = response.data.lisCuaderno.data;
                                this.paginacion = response.data.paginacion;
                            });                        
                        },
                        modFec: function(fecha){
                            // moment(String(tarea.pc_fec)).format('DD/MM')
                            var fecMod = ''; 
                            fecMod = moment(String(fecha)).format('D MMM');
                            return fecMod;
                        },
                        cambiarPag:function(pag){
                            this.paginacion.act_pag = pag;
                            this.getAct(pag);

                        },                  
                    }
                });

                $(document).ready(function () {
                    initSample();                
                });
        </script>        
    </body>