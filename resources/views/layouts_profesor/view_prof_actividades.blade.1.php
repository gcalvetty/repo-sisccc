@extends('layouts_sisccc.pagsis_prof_tarea')
@section('titulo','Profesor')
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
@include('layouts_profesor.partials.menu')   
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
            <li><a href="/direccion/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>

    <!-- Main content -->    
    <section class="content" id="Prof_tareas">           
        
        <div class="row">
            <div class="col-md-12" id="verTareas"> 
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-thumb-tack"></i>
                        <h3 class="box-title">Nueva Actividad</h3>                          
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#TareaModal">Nueva Actividad</a>                    
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="simple" class="table table-stripe table-hover">
                                <thead> 
                                    <tr>                                        
                                        <th class="col-md-1">Fecha</th>
                                        <th class="col-md-2">Curso</th>
                                        <th class="col-md-3">Materia</th> 
                                        <th class="col-md-5">Descripción</th>                                 
                                        <th class="col-md-1">Accion</th> 
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr  v-for="tarea in listado" scope="row">                                        
                                        <td>@{{ tarea.tar_fec }}</td>
                                        <td>@{{ tarea.tar_curso}}</td>                                
                                        <td>@{{ tarea.tar_materia}}</td>
                                        <td>@{{ tarea.tar_desc}}</td>                                
                                        <td>
                                            <button type="button" class="btn btn-danger" v-on:click.prevent="eliminarTarea(tarea)">
                                                <i class="fa fa-trash-o"> </i>
                                            </button>
                                        </td>
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </section>
    <section>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="TareaModal">
                <div class="modal-dialog" role="document" id="insTarea"> 
                    <form action="#" v-on:submit.prevent="validateBeforeSubmit" method="post">            
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel">Asignar Nueva Tarea<span class="Alm"></span></h4>
                            </div>
                            <div class="modal-body" >
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                    <span class="input-group-addon"><i class="fa fa-book" aria-hidden="true"></i></span>
                                                    <select name="tar_m" id="tar_m" v-model="tar_materia"
                                                           placeholder="Materia:" class="materSel">
                                                            <?php echo $Lista ?>
                                                    </select> 
                                            </div>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <div class="form-group has-feedback {{ $errors->has('fec') ? ' has-error' : '' }}" v-bind:class="{'': true, 'has-error': errors.has('fec') }">
                                            <div class="input-group">
                                                <span class="input-group-addon" id="basic-addon10"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                                <vuejs-datepicker id="fec" name="fec" 
                                                                :value="state.date" 
                                                                :format="customFormatter" 
                                                                :language="es"
                                                                v-model="fec"></vuejs-datepicker>
                                            </div>
                                        </div>                                
                                    </div>
                                    
                                    <div class="col-md-12"> 
                                        <textarea id="editor" name="editor" rows="5" cols="80" 
                                                v-bind:class="{'': true, 'has-error': errors.has('editor') }" 
                                                v-model="editor"
                                                data-vv-rules="required">
                                        </textarea>
                                        <input class="AlmId" id="AlmId" name="AlmId" value="" hidden="true" />
                                    </div> 

                                    
                                    
                                    <div class="col-md-12" style="margin-top:20px;"> 
                                        <div class="form-group">
                                            <div class="input-group input-file" name="ArcDoc">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-info btn-choose" type="button"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
                                                </span>
                                                <input type="text" class="form-control" placeholder='Seleccionar Imagen de Apoyo, si fuera es necesario!!!' />
                                                <span class="input-group-btn">
                                                        <button class="btn btn-warning btn-reset"                    
                                                        type="button">Borrar</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="iniVal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary pull-right guardar" disabledGECN>Guardar</button>
                            </div>
                            <span v-for="error in errors" class="text-danger">
                                @{{ error }}
                            </span> 
                    {!! Form::close() !!}                               
                </div>            
            </div>

    </section>


</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection

	
