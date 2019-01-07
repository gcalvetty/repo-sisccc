@extends('layouts_sisccc.pagsis_psico')
@section('titulo','psicolog@')	
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
    <!-- Content Header (Page header) -->
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
            <div class="col-xs-12">
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
                                             <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}
                                             </div>    
                                    </td>
                                    <td>{{ $Alumno->curso }} - {{ $Alumno->aula }}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target=".bs-example-modal-lg"
                                                data-idalm="{{ $Alumno->id }}"
                                                data-nomalm=" {{ $Alumno->nombre }} {{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }}">
                                            <i class="fa fa-edit"></i></button>
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

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="EstudianteModal">
        <div class="modal-dialog" role="document" id="Comportamiento">            
            <form v-on:submit="validateBeforeSubmit" class="form-horizontal" role="form" action="{{route('Psico.insCom')}}">    
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Comportamiento del Alumn@: <span class="Alm"></span></h4>
                    </div>
                    <div class="modal-body" > 
                         <div class="col-lg-12">   
                            <div class="form-group has-feedback {{ $errors->has('fec') ? ' has-error' : '' }}" v-bind:class="{'': true, 'has-error': errors.has('fec') }">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon10"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" id="fec"  name="fec" value="{{ old('fec') }}"  placeholder="Fecha DD/MM/YYYY" aria-describedby="basic-addon10" v-model="fec"  v-validate.initial="fec" data-vv-rules="required|date_format:DD/MM/YYYY" data-vv-delay="200" v-bind:class="{'': true, 'has-error': errors.has('fec') }">
                                </div>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" v-bind:class="{'': true, 'glyphicon-remove': errors.has('fec') }"></span>
                                @if ($errors->has('fec'))<span class="help-block"><strong>{{ $errors->first('fec') }}</strong></span>@endif
                            </div>
                        </div>   
                         <div class="col-lg-12">
                                <textarea id="editor" name="editor" rows="5" cols="80" 
                                          v-bind:class="{'': true, 'has-error': errors.has('editor') }" 
                                          data-vv-rules="required" >                                    
                                </textarea>
                        </div>
                        <input class="AlmId" id="AlmId" name="AlmId" value="" hidden="true">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                        
                        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']); !!}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

