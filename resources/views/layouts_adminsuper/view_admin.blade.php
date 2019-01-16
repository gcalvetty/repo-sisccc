@extends('layouts_sisccc.pagsis-adminsuper')
@section('titulo','Super Usuario - CCC')	
@section('usuccc')
{{ $usuactivo }}
@endsection
@section('usuico')
<i class="fa fa-desktop  fa-2x"></i>
@endsection
@section('usuico-peq')
<i class="fa fa-desktop fa-lg"></i>
@endsection

@section('sis_menu_lateral')
@include('layouts_adminsuper.partials.menu')
@endsection

@section('sis_alm_inscritos')
@include('layouts_sisccc.partials.pagsis_alm_insc')
@endsection

@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            <small>Bienvenido Administrador!!!</small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>    

    <section class="content admTra">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Secciones del Sistema Colegio Cristiano Colcapirhua</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>                
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>ADMINISTRACIÓN</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-puzzle-piece" aria-hidden="true"></i>                                
                            </div>
                            <a href="{{ route('Admtr.Reg')}}" class="small-box-footer" target="Opc1">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                  
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>DIRECCIÓN</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('Dir.Reg')}}" class="small-box-footer" target="Opc2">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                  
                    </div>
                    


                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-red-gradient">
                            <div class="inner">
                                <h3>CONTADOR</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-calculator" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('Cont.Reg') }}" class="small-box-footer" target="Opc3">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>SECRETARÍA</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-id-card-o"></i>                                
                            </div>
                            <a href="{{ route('Secr.Reg') }}" class="small-box-footer" target="Opc4">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                 
                    </div>  
                    
                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-light-blue">
                            <div class="inner">
                                <h3>REGENTE</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-binoculars" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('Rege.Reg') }}" class="small-box-footer" target="Opc5">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                 
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-teal-gradient">
                            <div class="inner">
                                <h3>Dep. PSICOLOGICO</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('Psico.Reg') }}" class="small-box-footer" target="Opc6">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                 
                    </div>
                </div>

            </div>
        </div>

        @if(isset($CantAlm))
        @yield('sis_alm_inscritos')
        @endif
    </section>


    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection

@section('menu-configuracion')
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>      
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Actividades Recientes</h3>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
@endsection
