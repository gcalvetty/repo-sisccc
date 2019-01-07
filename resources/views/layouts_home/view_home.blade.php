@extends('layouts_sisccc.pag_home')
@section('titulo','Home')

@section('home_menu')
    @include('layouts_home.partials.home_menu')
@endsection	

@section('home_footer')
    @include('layouts_home.partials.home_footer')
@endsection

@section('home_contenido')
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
                        <p>Comportamiento del plantel Estudiantil, llamadas de atención, Tarjetas</p>
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
                        <h3>Inscripciones abiertas</h3>
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
                        <p>Ver Actividades, a partir de las fechas inficadas</p>
                        <a href="{{ route('Home.Act') }}" class="btn academy-btn btn-sm">Ver mas</a>
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
                        <a href="{{ route('Home.Comu') }}" class="btn academy-btn btn-sm">Ver mas</a>
                    </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-2.jpg')}});"></div>
                </div>
            </div>

            <!-- Single Top Popular Course -->
            <div class="col-12 col-lg-6" hidden="hidden">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="600ms">
                    <div class="popular-course-content">
                        <h5>Rol de Examenes</h5>                                
                        <p>Tener en cuenta el rol de examenes.</p>
                        <a href="{{ route('Home.Exm') }}" class="btn academy-btn btn-sm">Ver mas</a>
                    </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-3.jpg')}});"></div>
                </div>
            </div>

            <!-- Single Top Popular Course -->
            <div class="col-12 col-lg-6" hidden="hidden">
                <div class="single-top-popular-course d-flex align-items-center flex-wrap mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <div class="popular-course-content">
                        <h5>Menú del Mes</h5>                                
                        <p>Nuestro menú para este mes es...</p>
                        <a href="{{ route('Home.Menu') }}" class="btn academy-btn btn-sm">Ver mas</a>
                    </div>
                    <div class="popular-course-thumb bg-img" style="background-image: url({{ asset('paralax/img/bg-img/pc-4.jpg')}});"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Top Popular Courses Area End ##### -->
@endsection




