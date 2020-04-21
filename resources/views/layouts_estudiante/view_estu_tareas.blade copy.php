@extends('layouts_sisccc.pagsis_estudiante')
@section('titulo','Estudiante | Tareas')
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
            <li><a href="{{route("est.Escritorio") }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tarea</li>
        </ol>
    </section>

    <!-- Main content -->    
    
    <section class="content">
        <div class="row">
            <section class="col-lg-12 connectedSortable ui-sortable">                
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-tasks"></i>
                        <h3 class="box-title">Tareas</h3>
                        <div class="btn-ImprGECN" style="text-align:right; float:right;">
                            <button type="button" onclick="javascript:window.print('IMPTareasCCCGECN')" class="noimp btn btn-lg btn-success">
                            <i class="fa fa-print fa-2x" aria-hidden="true"></i> Imprimir</button>
                        </div>        
                    </div>                    
                    
                    <div class="box-body">    
                        <div class="tarea" id="IMPTareasCCCGECN">
                            <table id="example1" class="table table-condensed table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1">Fechas</th>                                        
                                        <th class="col-lg-2">Materia</th>
                                        <th class="col-lg-9">Descripción</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cont = 1 ?>
                                    @foreach($tareas as $Alumno)
                                    <tr>
                                        <td>Ini: {{ sis_ccc\libreriaCCC\fncCCC::getDateAttribute($Alumno->tar_fec_ini) }}<br/>
                                            Fin: {{ sis_ccc\libreriaCCC\fncCCC::getDateAttribute($Alumno->tar_fec_fin) }}</td> 
                                        <td>{{ $Alumno->tar_materia }}</td>
                                        <td class="tar_desc">
                                            <?php echo html_entity_decode($Alumno->tar_desc) ?>    
                                            @if ($Alumno->tar_doc != '')
                                            <div class="noimpr">
                                                    <a href="{{ $Alumno->tar_doc }}" target="_blank" title="Apoyo" class="noimpr"><i class="fa fa-download fa-2x" aria-hidden="true"></i> Descargar!!!</a>
                                            </div>
                                            @endif
                                        </td>                                                              
                                    </tr>
                                    @endforeach                                                    
                                    </tbody>                 
                            </table>
                        </div>
                    </div>    
                </div> 
            </section>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer noimp">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection




