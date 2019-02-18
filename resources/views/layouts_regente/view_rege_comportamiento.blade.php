@extends('layouts_sisccc.pagsis_regente_comportamiento')
@section('titulo','Regente')	
@section('usuccc')
{{ $usuactivo }}
@endsection
@section('usuico')
<i class="fa fa-cubes fa-2x"></i>
@endsection
@section('usuico-peq')
<i class="fa fa-cubes fa-lg"></i>
@endsection

@section('sis_menu_lateral')
@include('layouts_regente.partials.menu')
@endsection


@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio:
            <small>Comportamiento</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/direccion/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>    

    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Comportamiento Escolar - Lista de Alumnos</h3>                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="col-md-1">N°</th>
                                    <th class="col-md-4">Alumno</th> 
                                    <th class="col-md-1">Curso</th>
                                    <th class="col-md-1">Comportamiento</th>
                                    <th class="col-md-1">Tarjeta</th> 
                                    <th class="col-md-2">Observacion</th>
                                    <th class="col-md-1">Fecha</th>
                                    <th class="col-md-1">Eliminar</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $aux = 1 ?>                                
                                @foreach($Lista as $Alumno)
                                <?php
                                $tipTar = "";
                                switch ($Alumno->tiptarj) {
                                    case "Sin Tarjeta":
                                        $tipTar = "success";
                                        break;
                                    case "Tarjeta Blanca":
                                        $tipTar = "info";
                                        break;
                                    case "Tarjeta Amarilla":
                                        $tipTar = "warning";
                                        break;
                                    case "Tarjeta Roja":
                                        $tipTar = "danger";
                                        break;
                                }
                                ?>
                                <tr class="{{ $tipTar }}">
                                    <td>{{ $aux++ }}</td>                                     
                                    <td>
                                            <div class="col-md-2">                                            
                                                    <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30) ?>
                                                </div>
                                                <div class="col-md-9 text-left">
                                                <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}
                                                </div>    
                                    </td> 
                                    <td>{{ $Alumno->curso }} </td>
                                    <td>{{ $Alumno->tipcomp }}</td>                                    
                                    <td>{{ $Alumno->tiptarj }}</td>
                                    <td><?php echo html_entity_decode($Alumno->obser) ?></td>
                                    <td><?php echo sis_ccc\libreriaCCC\fncCCC::getDateAttribute($Alumno->fec) ?></td>
                                    <td>
                                        <button type="button" class="btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target=".bs-example-modal-lg"
                                                data-idalm="{{ $Alumno->reg_id }}"
                                                data-nomalm=" {{ $Alumno->nombre }} {{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }}">
                                            <i class="fa fa-trash"></i></button>
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
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="EstudianteModal">
        <div class="modal-dialog" role="document" id="Comportamiento">            
            <form v-on:submit="validateBeforeSubmit" class="form-horizontal" role="form" action="{{route('Rege.delCom')}}">    
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Desea elimar el Registro del Alumn@: <span class="Alm"></span></h4>
                    </div>
                    <input class="AlmIdAux" id="AlmId" name="AlmId" value="" hidden="true">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Aceptar', ['class' => 'btn btn-danger']); !!}
                    </div>
                </div>
            </form>
        </div>
    </div>

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
