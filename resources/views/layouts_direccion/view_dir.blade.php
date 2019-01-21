@extends('layouts_sisccc.pagsis_direccion')
@section('titulo','Dirección')
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
@include('layouts_direccion.partials.menu')
@endsection

@section('sis_alm_inscritos')
@if(isset($CantAlm))
@include('layouts_sisccc.partials.pagsis_alm_insc')
@endif
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

        @if(Session::has('MensajeElim'))
        <p class="alert alert-success" transition="fade">{{ Session::get('MensajeElim')}}</p>           
        @endif

    </section> 

    <section class="content">
        @if($Grd == null)
        @yield('sis_alm_inscritos')
        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-warning">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>
                        <h3 class="box-title">Comunicados</h3>
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
        </div>
        @endif
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Alumnos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (session()->has('success'))                                                        
                            <div class="bs-example">
                                <div class="alert alert-info fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Información:</strong> {{ session('success') }}
                                </div>
                            </div>
                        @endif
                        @if (session()->has('warning'))                                                        
                            <div class="bs-example">
                                <div class="alert alert-danger fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Información:</strong> {{ session('warning') }}
                                </div>
                            </div>
                        @endif
                        
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Alumno</th>                                    
                                    <th>Curso</th>                                    
                                    <th>Editar</th>                                    
                                    <th>Apoyos</th>
                                    <th>Mas</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $aux = 1 ?>
                                    @foreach($Lista as $Alumno)
                                    <tr>
                                        <td>{{ $aux++ }}</td>  
                                        <td>
                                               <div class="col-md-2 col-xs-12">                                            
                                                    <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30) ?>
                                                </div>
                                                <div class="col-md-9 col-xs-12 text-left">
                                                <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}
                                                </div>    
                                        </td>
                                        <td>
                                                {{ $Alumno->curso }} - {{ $Alumno->aula }}    
                                        </td>                                    

                                    <td style="text-aling:center">
                                        <div data-toggle="tooltip" data-placement="top"  title="Editar RUDE">
                                        <a href="{{ route('rude-d.edit', ['alumno' => $Alumno->id]) }}" target="editar-{{ $Alumno->id }}" class="btn btn-github">
                                            <i class="fa fa-pencil-square-o fa-fw" aria-hidden="true"></i></a>
                                        </div>    
                                    </td>    
                                    
                                    <td>
                                        <div class="col-md-4" data-toggle="tooltip" data-placement="top" title="Imprimir RUDE">
                                            <a href="{{ route('rude-d.imprimir', ['alumno' => $Alumno->id]) }}" target="rude-{{ $Alumno->id }}" class="btn btn-vimeo">
                                                <i class="fa fa-print  fa-fw" aria-hidden="true"></i></a>
                                        </div>    
                                        <div class="col-md-4"  data-toggle="tooltip" data-placement="top"  title="Ver Libreta">
                                            @if ($Alumno->libreta !='')
                                            <a href="{{ $Alumno->libreta }}" class="btn btn-yahoo" target="libreta-{{ $Alumno->id }}"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i></a>                                        
                                            @endif
                                        </div>
                                        <div class="col-md-4" data-toggle="tooltip" data-placement="top"  title="Ver Acceso">
                                            <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#exampleModal20" 
                                                    data-usuario="{{ $Alumno->email }}"
                                                    data-alumno="{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}"
                                                    >
                                                <i class="fa fa-sign-in fa-fw" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                    
                                    <td>
                                        <div data-toggle="tooltip" data-placement="top"  title="Borrar Alumno">
                                        {!!Form::open([
                                        'method'=>'delete',
                                        'route' =>['rude-d.destroy',$Alumno->id]
                                        ])!!}                                        
                                        <button type="button" class="btn btn-danger"
                                                data-toggle="modal" 
                                                data-target="#exampleModal21" 
                                                data-id="{{ $Alumno->id }}"
                                                data-alumno="{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}">
                                            <i class="fa fa-trash" aria-hidden="true"></i></button>


                                        {!!Form::close()!!}
                                        </div>
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
    <div class="modal fade" id="exampleModal20" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="exampleModalLabel"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <label class="modal-title"></label></h4>
                </div>
                <div class="modal-body">

                    <ul class="list-group">
                        <li class="list-group-item "><i class="fa fa-user-circle-o modal-usu" aria-hidden="true"></i></li>
                        <li class="list-group-item"><i class="fa fa-key" aria-hidden="true">-- cccedu --</i> </li>
                    </ul>
                </div>
                
                <div class="modal-footer">
                    <a class="btn btn-direction modal-urlMod" href="#" >
                           
                            <i class="fa fa-key" aria-hidden="true"></i> <span>Modificar Contraseña</span>       
                    </a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal21" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">               
                <div class="modal-body">                        
                        <div class="panel-group">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 id="exampleModalLabel"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <label class="modal-title"></label></h4>
                                </div>
                                <div class="panel-body">
                                    <p> Se eliminara todo el contenido registrado para el Alumno  </p>
                                    <ul>
                                        <li>RUDE</li>
                                        <li>Documentación almacenada</li>
                                    </ul>  
                                </div>
                            </div>                               
                        </div>
                </div>            
                <div class="modal-footer">

                    {!!Form::open([
                    'name' => 'delRude', 
                    'class' => 'modal-delRude',   
                    'method'=>'get',
                    'route' =>['Dir.delAlm',1]
                    ])!!}                    
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Aceptar </button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.content-wrapper -->
<footer class="main-footer">     
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection