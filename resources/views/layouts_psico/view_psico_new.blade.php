@extends('layouts_sisccc.pagsis_psico_new')
@section('titulo','Psicolog@')	
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
@include('layouts_psico.partials.menu')
@endsection


@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    
    <section class="content-header">      
        <h1>
            Lista de Alumnos
        </h1>
        <ol class="breadcrumb">
            <li><a href="/direccion/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section> 
   
    <section class="content">
        <div class="row">
            <div class="col-md-10 col-md-push-1">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Alumnos</h3>                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body ">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Alumno</th>
                                    <th>Curso</th>                                    
                                    <th>Conducta</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $aux = 1 ?>
                                @foreach($Lista as $Alumno)
                                <tr>                                    
                                    <td>{{ $aux++ }}</td>                                     
                                    <td>
                                            <div class="col-md-2">                                            
                                                 <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30) ?>
                                             </div>
                                             <div class="col-md-9 text-left">
                                             <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }}, {{ $Alumno->nombre }}
                                             </div>    
                                    </td>
                                    <td>{{ $Alumno->curso }} - {{ $Alumno->aula }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target=".bs-example-modal-lg"
                                                data-idalm="{{ $Alumno->id }}"
                                                data-nomalm=" {{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }}, {{ $Alumno->nombre }}">
                                            <i class="fa fa-edit"></i></button>
                                    </td>                                    
                                    @endforeach    
                                </tr>

                                </tfoot>
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
</div>
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="EstudianteModal">
        <div class="modal-dialog" role="document" id="Comportamiento"> 
            {!! Form::open(['route'=>'Psico.insCom','files'=>true]) !!}            
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Comportamiento del Alumn@: <span class="Alm"></span></h4>
                    </div>
                    <div class="modal-body" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback {{ $errors->has('fec') ? ' has-error' : '' }}" v-bind:class="{'': true, 'has-error': errors.has('fec') }">
                                    <div class="input-group">
                                        <span class="input-group-addon" id="basic-addon10"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                        <vuejs-datepicker id="fec" name="fec" 
                                                          :value="state.date" 
                                                          :format="customFormatter" 
                                                          :language="es"                                                      
                                                          v-model="fec"></vuejs-datepicker>
                                    </div>
                                    <span class="glyphicon  form-control-feedback" aria-hidden="true" v-bind:class="{'': true, 'glyphicon-remove': errors.has('fec') }"></span>
                                    @if ($errors->has('fec'))<span class="help-block"><strong>{{ $errors->first('fec') }}</strong></span>@endif
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
                                        <input type="text" class="form-control" placeholder='Selecciona el documento de Resumen del estudiante...' />
                                        <span class="input-group-btn">
                                                <button class="btn btn-warning btn-reset" type="button">Borrar</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" v-on:click="iniVal">Cerrar</button>
                        <button type="submit" class="btn btn-primary pull-right guardar" disabled>Guardar</button>
                    </div>
            {!! Form::close() !!}                               
        </div>            
    </div>
</div>    
<footer class="main-footer">
        {!! Html::footer('siscccConfig.pie') !!}
</footer>  
@endsection