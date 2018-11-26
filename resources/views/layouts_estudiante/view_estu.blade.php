@extends('layouts_sisccc.pagsis_estudiante')
@section('titulo','Estudiante')
@section('usuccc')
{{ $usuactivo }}
@endsection
@section('usuico')
<i class="fa fa-graduation-cap fa-2x"></i>
@endsection
@section('usuico-peq')
<i class="fa fa-graduation-cap fa-lg"></i>
@endsection

@section('sis_menu_lateral')
@include('layouts_estudiante.partials.menu')
@endsection	

@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio           
        </h1>
        <ol class="breadcrumb">
            <li><a href="/dirección/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>

    <!-- Main content -->    
    @if ($VerCont=="Inscrito")
    <section class="content">
        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-warning">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title">Comunicado - Estudiantes</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>                                         
                                    <th>Titulo</th>
                                    <th>Descripción</th> 
                                    <th>Fecha</th>                                                                          
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListaC as $Comu)
                                <tr>
                                    <td>{{ $Comu->com_id }}</td>  
                                    <td>{{ $Comu->com_titulo }}</td>
                                    <td>{{ $Comu->com_desc }}</td>                                    
                                    <td>{{ $Comu->com_fec }}</td> 
                                </tr>                                
                                @endforeach 

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-calendar"></i>
                        <h3 class="box-title">Actividades</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>                                         
                                    <th>Titulo</th>                                     
                                    <th>Fecha</th>                                                                          
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ListaA as $Act)
                                <tr>
                                    <td>{{ $Act->act_id }}</td>  
                                    <td>{{ $Act->act_titulo }}</td>                                    
                                    <td>{{ $Act->act_fec }}</td> 
                                </tr>                                
                                @endforeach 

                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


        </div>    
        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-tasks"></i>
                        <h3 class="box-title">Tareas</h3>

                    </div>
                    <div class="box-body">    
                        <div class="tarea">
                            <table class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>                                
                                        <th>#</th>
                                        <th class="col-lg-2">Fecha</th>
                                        <th class="col-lg-3">Materia</th>
                                        <th class="col-lg-7">Descripción</th>                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1 ?>
                                    @foreach($tareas as $Alumno)
                                    <tr>                   
                                        <td>{{ $cont++ }}</td> 
                                        <td>{{ $Alumno->tar_fec_ini }}</td> 
                                        <td>{{ $Alumno->tar_materia }}</td>
                                        <td class="tar_desc">{{ $Alumno->tar_desc }}</td>                                                               
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td  class="verReg" colspan="4">
                                            <a href="{{ route("est.Tareas")}}">Ver Todas las Tareas <i class="fa fa-angle-double-right"></i></a>
                                        </td>
                                    </tr>                 
                                    </tfoot>                 
                            </table>
                        </div>
                    </div>    
                </div> 
            </section>
            <section class="col-lg-6 connectedSortable ui-sortable ">
                <div class="box box-info">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-binoculars"></i>
                        <h3 class="box-title">Comportamiento</h3>

                    </div>
                    <div class="box-body">    
                        <div class="tarea">
                            <table class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>                                
                                        <th>#</th>
                                        <th class="col-lg-2">Fecha</th>
                                        <th class="col-lg-2">Comportamiento</th>
                                        <th class="col-lg-1">Tarjeta</th>
                                        <th class="col-lg-7">Observación</th>                                
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1 ?>
                                    @foreach($comp as $Alumno)
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
                                        <td>{{ $cont++ }}</td>  
                                        <td>{{ $Alumno->fec }}</td>                                          
                                        <td>{{ $Alumno->tipcomp }}</td>
                                        <td>{{ $Alumno->tiptarj }}</td>
                                        <td>{{ $Alumno->obser }}</td>                                                                               
                                        @endforeach    
                                    </tr>
                                    <tr>
                                        <td class="verReg" colspan="5">
                                            <a href="{{ route("est.Compor")}}">Ver Todos las llamadas de Atención <i class="fa fa-angle-double-right"></i></a>
                                        </td>
                                    </tr>                 
                                </tbody>                 
                            </table>
                        </div>
                    </div> 
                </div> 
            </section>


        </div>

        <!-- Default box -->        
        <div class="box-body hidden">
            <section id="download">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Libreta Escolar</h3>
                                <span class="label label-primary pull-right"><i class="fa fa-html5"></i></span>
                            </div><!-- /.box-header -->
                            @if(( $libreta =='libreta.pdf') || ($libreta == ''))
                            <div class="alert alert-danger" role="alert">            
                                <p>No tienen acceso para ver la libreta escolar del 3er Parcial!!!</p>                        
                            </div><!-- /.box-body -->
                            @else
                            <div class="box-body">            
                                <p>Puedes Vizualizar la libreta del estudiante ingresando a este enlace.</p>            
                                <a href="{{ route('libreta') }}" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> Ver Libreta</a>
                            </div><!-- /.box-body -->
                            @endif
                        </div><!-- /.box -->
                    </div><!-- /.col -->    
                </div><!-- /.row -->  
            </section>
        </div>
        <!-- /.box-body -->
    </section>
    @else
        @yield('est_pago')
    @endif
</div>

<!-- /.content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection

@section('est_pago')
<section class="content">
    <div id="contador_crud" class="row">
        <div class="col-xs-12">

            <div class="box">                   
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow" >
                            <h1 class="widget-user-desc">Pensiones Adeudadas!!!</h1>
                            <h3 class="widget-user-username" >{{$usuactivo}}</h3> 

                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="/imagenes/avatar/user-ccc-peq.png" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                            <div class="row">                                    
                                <!-- /.col -->
                                <div class="col-md-12 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Consultar por Facebook</h5>
                                        <div class="col-sm-12  fb-comments" data-href="https://www.facebook.com/pg/ColegioCristianoColcapirhuaOficial" data-numposts="5"></div>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <div class="col-md-12">
                                    <div class="bs-example" data-example-id="simple-alerts"> 

                                        <div class="alert alert-danger" role="alert">                                                
                                            <p><i class="fa fa-2x fa-exclamation-triangle"> Debe pasar a cancelar sus deudas pendiente!!! - </i>
                                                <i class="fa fa-2x fa-phone-square"> 4 - 4372143</i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>   
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</section>
@endsection


