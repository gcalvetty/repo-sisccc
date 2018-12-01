<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name')}}</title>        
        <meta charset="UTF-8">


        <title>{{ config('app.name', 'CCC-SIS') }}</title>
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

        @if (!Auth::guest())
        <!-- Styles -->
        <link href="/dist/css/AdminLTE.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/sisccc.css" rel="stylesheet"> 
        @endif

        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>

    <body>
        <!-- ##### Preloader ##### -->
        <div id="preloader">
            <i class="circle-preloader"></i>
        </div>
        @if (Auth::guest())

        <!-- ##### Header Area Start ##### -->
        <header class="header-area">

            <!-- Top Header Area -->
            <div class="top-header">
                <div class="container h-100">
                    <div class="row h-100">
                        <div class="col-12 h-100">
                            <div class="header-content h-100 d-flex align-items-center justify-content-between">
                                <div class="academy-logo">
                                    <a href="index.html"><img src="{{ asset('paralax/img/core-img/logo-ccc.png') }}" alt=""></a>
                                </div>
                                <div class="login-content">
                                    <a href="{{ route('acceder') }}">Acceso Sistema Información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navbar Area -->
            <div class="academy-main-menu">
                <div class="classy-nav-container breakpoint-off">
                    <div class="container">
                        <!-- Menu -->
                        <nav class="classy-navbar justify-content-between" id="academyNav">

                            <!-- Navbar Toggler -->
                            <div class="classy-navbar-toggler">
                                <span class="navbarToggler"><span></span><span></span><span></span></span>
                            </div>

                            <!-- Menu -->
                            <div class="classy-menu">

                                <!-- close btn -->
                                <div class="classycloseIcon">
                                    <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                                </div>

                                <!-- Nav Start -->
                                <div class="classynav">
                                    <ul>
                                        <li><a href="{{ route('homeCCC') }}">Home</a></li>
                                        <li><a href="#">Mas información</a>
                                            <ul class="dropdown">                       
                                                <li><a href="#">Actividades</a></li>
                                                <li><a href="#">Comunicados</a></li>
                                                <li><a href="#">Rol Examenes</a></li>
                                                <li><a href="#">Menú del Mes</a></li>                                                
                                            </ul>
                                        </li>    
                                        <li><a href="#">Contactanos</a></li>
                                    </ul>
                                </div>
                                <!-- Nav End -->
                            </div>

                            <!-- Calling Info -->
                            <div class="calling-info">
                                <div class="call-center">
                                    <a href="tel:+5914372142"><i class="icon-telephone-2"></i> <span>(+591) 4372142</span></a>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Hero Area Start ##### -->
        <section class="hero-area">
            <div class="hero-slides owl-carousel">

                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('paralax/img/bg-img/bg-1.jpg')}});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h4 data-animation="fadeInUp" data-delay="100ms">Sistema de Información C.C.C</h4>
                                    <h2 data-animation="fadeInUp" data-delay="400ms">Bienvenido !!!</h2>
                                    <a href="{{ route('acceder') }}" class="btn academy-btn" data-animation="fadeInUp" data-delay="1000ms">Acceso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Single Hero Slide -->
                <div class="single-hero-slide bg-img" style="background-image: url({{ asset('paralax/img/bg-img/bg-2.jpg')}});">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-12">
                                <div class="hero-slides-content">
                                    <h4 data-animation="fadeInUp" data-delay="100ms">Reservas</h4>
                                    <h2 data-animation="fadeInUp" data-delay="400ms">2019</h2>
                                    <a href="https://www.facebook.com/ColegioCristianoColcapirhuaOficial/" target="_blank" class="btn academy-btn" data-animation="fadeInUp" data-delay="1000ms">Solicitar mas Información</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ##### Hero Area End ##### -->

        <!-- ##### Top Feature Area Start ##### -->
        <div class="top-features-area wow fadeInUp" data-wow-delay="300ms">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="features-content">
                            <div class="row no-gutters">
                                <!-- Single Top Features -->
                                <div class="col-12 col-md-4">
                                    <div class="single-top-features d-flex align-items-center justify-content-center">
                                        <i class="icon-agenda-1"></i>
                                        <h5>Docentes</h5>
                                    </div>
                                </div>
                                <!-- Single Top Features -->
                                <div class="col-12 col-md-4">
                                    <div class="single-top-features d-flex align-items-center justify-content-center">
                                        <i class="icon-assistance"></i>
                                        <h5>Estudiantes</h5>
                                    </div>
                                </div>
                                <!-- Single Top Features -->
                                <div class="col-12 col-md-4">
                                    <div class="single-top-features d-flex align-items-center justify-content-center">
                                        <i class="icon-telephone-3"></i>
                                        <h5>Administrativos</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Top Feature Area End ##### -->

        <!-- ##### Course Area Start ##### -->
        <div class="academy-courses-area section-padding-100-0">
            <div class="container">
                <div class="row">
                    <!-- Single Course Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="300ms">
                            <div class="course-icon">
                                <i class="icon-id-card"></i>
                            </div>
                            <div class="course-content">
                                <h4>Estudiantes</h4>
                                <p>Actividades Escolares del Unidad Educativa, Tareas por Materias, Comportamiento del Estudiante, y mas...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Course Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="400ms">
                            <div class="course-icon">
                                <i class="icon-worldwide"></i>
                            </div>
                            <div class="course-content">
                                <h4>Docentes</h4>
                                <p>Actividades Escolares, Asignación de trabajos a plantel estudiantil y mas...</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Course Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <div class="course-icon">
                                <i class="icon-map"></i>
                            </div>
                            <div class="course-content">
                                <h4>Administrativos</h4>
                                <p>Dirigido al plantel administrativo de la unidad Educativa.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Course Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="600ms">
                            <div class="course-icon">
                                <i class="icon-like"></i>
                            </div>
                            <div class="course-content">
                                <h4>Dirección</h4>
                                <p>Dirigido al Plantel Educativo y Estudiantil, actividades y comunicados</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Course Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <div class="course-icon">
                                <i class="icon-responsive"></i>
                            </div>
                            <div class="course-content">
                                <h4>Regencia</h4>
                                <p>Compoartamiento del plantel Estudiantil, llamadas de atención, Tarjetas</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Course Area -->
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="single-course-area d-flex align-items-center mb-100 wow fadeInUp" data-wow-delay="800ms">
                            <div class="course-icon">
                                <i class="icon-message"></i>
                            </div>
                            <div class="course-content">
                                <h4>Dep. Psicologico</h4>
                                <p>Apoyo Psicologico al plantes Estudiantil.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Course Area End ##### -->

        <!-- ##### Inscripciones ##### -->
        <?php if ((date("m") >= 1) and ( date("m") < 3)) { ?>
            <div class="call-to-action-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cta-content d-flex align-items-center justify-content-between flex-wrap">
                                <h3>Suscripciones abiertas</h3>
                                <a href="{{ route('acceder') }}" class="btn academy-btn">Ver mas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @component('layouts_sisccc.pag_home_inscripcion')
            @endcomponent
        <?php } ?>
        <!-- ##### Inscripciones End ##### -->

        <!-- ##### Top Popular Courses Area Start ##### -->
        <div class="top-popular-courses-area section-padding-100-70">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center mx-auto wow fadeInUp" data-wow-delay="300ms">
                            <span>Mas Información</span>
                            <h3>a tener en cuenta</h3>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- Single Top Popular Course -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="400ms">
                            <div class="popular-course-content">
                                <h5>Actividades</h5>                                
                                <p>Ver Roles de Examenes, a partir de las fechas inficadas</p>
                                <a href="#" class="btn academy-btn btn-sm">Ver mas</a>
                            </div>
                            <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-1.jpg')}});"></div>
                        </div>
                    </div>

                    <!-- Single Top Popular Course -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="500ms">
                            <div class="popular-course-content">
                                <h5>Comunicados</h5>                                
                                <p>Comunicados para el plante Estudiantil</p>
                                <a href="#" class="btn academy-btn btn-sm">Ver mas</a>
                            </div>
                            <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-2.jpg')}});"></div>
                        </div>
                    </div>

                    <!-- Single Top Popular Course -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="600ms">
                            <div class="popular-course-content">
                                <h5>Rol de Examenes</h5>                                
                                <p>Tener en cuenta el rol de examenes.</p>
                                <a href="#" class="btn academy-btn btn-sm">Ver mas</a>
                            </div>
                            <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-3.jpg')}});"></div>
                        </div>
                    </div>

                    <!-- Single Top Popular Course -->
                    <div class="col-12 col-lg-6">
                        <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="700ms">
                            <div class="popular-course-content">
                                <h5>Menú del Mes</h5>                                
                                <p>Nuestro menú para este mes es...</p>
                                <a href="#" class="btn academy-btn btn-sm">Ver mas</a>
                            </div>
                            <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-4.jpg')}});"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Top Popular Courses Area End ##### -->
        @else

        @component('layouts_sisccc.pag_home_logeado')

        @endcomponent

        @endif 


        <!-- ##### Footer Area Start ##### -->
        <footer class="footer-area">
            <div class="main-footer-area section-padding-100-0">
                <div class="container">
                    <div class="row">

                    </div>
                </div>
            </div>
            <div class="bottom-footer-area">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos derechos reservados C.C.C | Desarrollado <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="https://gecn-dev.tech" target="_blank">GECN-Dev</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- ##### Footer Area Start ##### -->

        <!-- ##### All Javascript Script ##### -->
        <!-- jQuery-2.2.4 js -->
        <script src="{{ asset('paralax/js/jquery/jquery-2.2.4.min.js') }}"></script>
        <!-- Popper js -->
        <script src="{{ asset('paralax/js/bootstrap/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{ asset('paralax/js/bootstrap/bootstrap.min.js')}}"></script>
        <!-- All Plugins js -->
        <script src="{{ asset('paralax/js/plugins/plugins.js')}}"></script>
        <!-- Active js -->
        <script src="{{ asset('paralax/js/active.js')}}"></script>
    </body>

</html>