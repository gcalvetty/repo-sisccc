@extends('layouts_sisccc.pagsis')
@section('titulo','Secretaría | Avatar')
@section('usuccc')
{{ $usuactivo }}
@endsection
@section('usuico')
<i class="fa fa-skyatlas fa-2x"></i>
@endsection
@section('usuico-peq')
<i class="fa fa-skyatlas fa-lg"></i>
@endsection

@section('sis_menu_lateral')
@include('layouts_secretaria.partials.menu')
@endsection

@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio:
            <small>Bienvenido!!!</small>
        </h1> 

        {!! Breadcrumbs::render() !!}
    </section> 
    <section class="content">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Alumnos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Alumno</th>
                                    <th>Curso</th>                                  
                                    <th>Subir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Lista as $Alumno)                                
                                <tr>
                                    <td>
                                        <div class="col-md-3">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30) ?>
                                        </div>
                                        <div class="col-md-9 text-left">
                                        <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}
                                        </div>    
                                    </td>
                                    <td>                                        
                                        {{ $Alumno->curso }} - {{ $Alumno->aula }}                                        
                                    </td>
                                    <td>                                        
                                            <a href="{{ route('Secr.subAvatar', ['idUsu' => $Alumno->id,'opc'=>3]) }}"><i class="fa fa-upload" aria-hidden="true"></i></a>
                                    </td>                                
                                </tr>    
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">    
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Personal</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>                                        
                                    <th>Avatar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $aux = 1 ?>
                                @foreach($Lista2 as $Alumno)                                    
                                <tr>                                        
                                    <td>{{ $aux++ }}</td>
                                    <td>
                                        <div class="col-md-3">
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30); ?>
                                        </div>
                                        <div class="col-md-9 text-left">
                                            <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}</b>
                                        </div>
                                    </td>    
                                    <td>{{ $Alumno->tipo_Usu }}</td>                                        
                                    <td>
                                        <a href="{{ route('Secr.subAvatar', ['idUsu' => $Alumno->id,'opc'=>3]) }}"><i class="fa fa-upload" aria-hidden="true"></i></a>
                                    </td>                                                                             
                                </tr>    
                                @endforeach  
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
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
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home">1</i></a></li>      
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
