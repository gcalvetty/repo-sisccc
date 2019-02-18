@extends('layouts_sisccc.pagsis')
@section('titulo','Profesor')	
@section('usuccc')
{{ $usuactivo }}
@endsection
@section('usuico')
<i class="fa fa-id-card-o fa-2x"></i>
@endsection
@section('usuico-peq')
<i class="fa fa-cubes fa-lg"></i>
@endsection

@section('sis_menu_lateral')
@include('layouts_profesor.partials.menu')
@endsection


@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio
            <small>Bienvenido!!!</small>            
        </h1>
        <ol class="breadcrumb">
            <li><a href="/profesor/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-warning">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title">Comunicado - Docente</h3>
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
                                    <td><?php echo sis_ccc\libreriaCCC\fncCCC::getDateAttribute($Comu->com_fec) ?></td> 
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
                                    <td><?php echo sis_ccc\libreriaCCC\fncCCC::getDateAttribute($Act->act_fec) ?></td> 
                                </tr>                                
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>    
            <section class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Alumnos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Alumno</th>
                                    <th>Curso</th>
                                    <th>Adiconales</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $aux = 1 ?>
                                @foreach($Lista1 as $Alumno)
                                <tr>
                                        <td>{{ $aux++ }}</td>  
                                        <td>
                                            <div class="col-md-2 col-xs-12">
                                                <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30) ?>
                                            </div>
                                            <div class="col-md-9 col-xs-12 text-left">
                                                <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }}</b>, {{ $Alumno->nombre }}
                                            </div>    
                                        </td>
                                        <td>
                                                {{ $Alumno->curso }} - {{ $Alumno->aula }}    
                                        </td>   
                                        <td>
                                            / -  /
                                        </td>                                 
                                </tr>
                                @endforeach 

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
        </div>  
    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection