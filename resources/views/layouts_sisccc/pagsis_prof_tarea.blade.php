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
        <style>
            .materSel{ height: 30px !important; } 
            .input-group.input-file input{ height: 36px !important; } 
            .opcTar{ margin-bottom:15px; }
        </style>

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
        <script src="/jquery/moment.js" type="text/javascript"></script>
        <script src="/jquery/vue.js" type="text/javascript"></script>        
        <script src="/jquery/vee-validate.js" type="text/javascript"></script>              
        <script src="/jquery/vue-datepicker/vuejs-datepicker.min.js" type="text/javascript"></script>
        <script src="/jquery/toastr.js" type="text/javascript"></script>
        <script src="/jquery/axios.js" type="text/javascript"></script>

        <!-- TextArea -->
        <script src="/jquery/ckeditor/ckeditor.js"></script>          
        <script src="/jquery/ckeditor/js/sample.js"></script>
        
        <script type="module">
            import esGECN from '/jquery/vue-datepicker/es.js';                                   
            
            /* ----- */
            Vue.use(VeeValidate);

            const app = new Vue({
                el: '#insTarea',
                components: {
                    vuejsDatepicker
                },
   
                validator: null,
                data() {
                    return {                        
                        tar_materia: '',
                        Curso:"",
                        Materia:0,
                        Mat_Tit:"",

                        fec: moment(),
                        fecFin: moment(),                                                
                        editor: "",
                        mensajeGECN:[],
                        
                        // -------------                        
                        es: esGECN,
                        state: {
                            date: new Date(),                          
                            disabledDates:{ days:[0] }
                        },
                    }
                },
                methods: { 
                    obtMateria: function(event){
                        var cadena = this.tar_materia;
                        var res = cadena.split(',');                                                
                        this.Curso  = res[0];
                        this.Materia= res[1];
                        this.Mat_Tit = $("#tar_m option:selected").text();
                    },

                    crearTarea: function () {                                                
                        var urlGuaAct = "actividad";
                        var cadena = this.tar_materia;
                        var res = cadena.split(',');
                        this.tar_cur_tit = res[0];
                        this.tar_materia = res[1];                        
                        this.tar_mat_tit = $("#tar_m option:selected").text();

                        
                        axios.post(urlGuaAct, {
                            Curso  : this.tar_cur_tit,
                            Materia: this.tar_materia,
                            Mat_Tit: this.tar_mat_tit,
                            fec    : this.customFormatter2(this.fec),
                            fecFin : this.customFormatter2(this.fecFin),
                            Tarea  : this.editor,
                        }).then(response => {                            
                            app2.getAct();                        
                            this.tar_materia = '';
                            this.editor = '';                            
                            toastr.info('Tarea Guardada!!!');
                                                        
                        }).catch(error => {                            
                            app2.getAct();                            
                            toastr.warning('Error al almacenar', 'Mensaje', {timeOut: 6000});                           
                        });
                        
                        
                    },                    
                    // --------------                    
                    validateBeforeSubmit(e) {                            
                            this.$validator.validateAll();
                            if (this.errors.any()) {
                                toastr.error('Requiere Completar el formulario!!!', 'Mensaje', {timeOut: 2000});
                                e.preventDefault();
                            }
                    },
                    customFormatter(date) {
                        return moment(date).format('D/MM/YYYY');
                    },
                    customFormatter2(date) {
                        return moment(date).format('YYYY/MM/D');
                    },       
                    iniVal:function(event){ 

                        toastr.warning('Se cancelo!!!', 'Mensaje', {timeOut: 2000})
                    }       
                }
            });            
        </script>
        <script>
                function bs_input_file() {
                    $(".input-file").before(
                        function() {
                            if ( ! $(this).prev().hasClass('input-ghost') ) {
                                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                                element.attr("name",$(this).attr("name"));
                                element.change(function(){
                                    element.next(element).find('input').val((element.val()).split('\\').pop());
                                    //--->$(".guardar").prop( "disabled", false );                                    
                                });
                                $(this).find("button.btn-choose").click(function(){
                                    element.click();
                                });
                                $(this).find("button.btn-reset").click(function(){
                                    element.val(null);                                    
                                    $(this).parents(".input-file").find('input').val('');
                                    // --->$(".guardar").prop( "disabled", true );
                                });
                                $(this).find('input').css("cursor","pointer");
                                $(this).find('input').mousedown(function() {
                                    $(this).parents('.input-file').prev().click();
                                    return false;
                                });
                                return element;
                            }                            
                        }
                    );
                }
                $(function() {
                    bs_input_file();
                });  
        </script>
        <script>
                const app2 = new Vue({
                    el: "#Prof_tareas",
                    created: function () {
                        this.getAct();
                    },
                    data: {
                        listado: [],
                    },
                    mounted: function () { //cuando se cargo la pagina
                
                    },
                    methods: {
                        getAct: function () {
                            var urlAct = "actividad/mostrar";
                            axios.get(urlAct).then(response => {
                                this.listado = response.data;
                            });
                        },                
                        eliminarTarea: function (tarea) {
                            var urlAct = "actividad/" + tarea.tar_id;                            
                            axios.delete(urlAct).then(response => {
                                this.getAct();
                                toastr.warning('Tarea Eliminada!!!' + response.data);
                            })
                        },
                    }
                });
                $(document).ready(function () {
                    initSample();
                    @if (session('success'))
                        toastr.info('Se Creo la Actividad.', 'Reporte', {timeOut: 3000})
                    @endif
                    @if ($errors->any())
                        var menErr = "<ul>"
                            @foreach ($errors->all() as $error)
                            menErr += "<li>{{ $error }}</li>";
                            @endforeach
                            menErr +="</ul>"
                            toastr.error(menErr, 'Reporte', {timeOut: 3000})    
                    @endif
                });
                
        </script>
    </body>