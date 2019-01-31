@extends('layouts_sisccc.pagsis-adminsuper')
@section('titulo','Super Usuario - CCC | Usuario')
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
            
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="col-xs-6">
                        <h3 class="box-title">Lista de Personal</h3>
                        </div>
                        <div class="col-xs-6 text-right">
                                <a href="{{ route('register') }}" target="nuevoUsuario2" class="btn btn-primary active" role="button" title="Dar de Alta">                                 
                                    <i class="fa  fa-user-plus"></i> <span>Crear Nuevo Usuario</span>
                                </a>                            
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        @if (session()->has('success'))                                                        
                        <div class="bs-example">
                            <div class="alert alert-info fade in">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> Información:</strong> {{ session('success') }} 
                                {{ session('usuario')}}</i>
                            </div>
                        </div>
                        @endif
                        @if (session()->has('warning'))                                                        
                            <div class="bs-example">
                                <div class="alert alert-warning fade in">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong><i class="fa fa-exclamation-triangle fa-lg" aria-hidden="true"></i> Información:</strong> {{ session('warning') }}
                                </div>
                            </div>
                        @endif


                        <table id="exampleUsuarios" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Tipo de Usuario</th>
                                    <th>Opciones</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $aux = 1 ?>
                                @foreach($Lista as $usuCCC)                                    
                                <tr>                                        
                                    <td>{{ $aux++ }}</td>
                                    <td>
                                        <div class="col-md-3">
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($usuCCC->id, 30); ?>
                                        </div>
                                        <div class="col-md-9 text-left">
                                            <b>{{ $usuCCC->ape_paterno }} {{ $usuCCC->ape_materno }} {{ $usuCCC->nombre }}</b>
                                        </div>
                                    </td>    
                                    <td>{{ $usuCCC->tipo_Usu }}</td>                                        
                                    <td>
                                        <div class="col-md-4">
                                        <a href="/direccion/password/reset-gecn/{{ $usuCCC->email }}" target="nuevoUsuario" class="btn btn-bitbucket active modal-urlMod" role="button" data-toggle="tooltip" data-placement="top"  title="Contraseña"><i class="fa fa-key" aria-hidden="true"></i>                   
                                        </a>
                                        </div>
                                        <div class="col-md-4">                                        
                                        @if(($usuCCC->libreta!='') || ($usuCCC->libreta!=null))
                                            <a href="{{ $usuCCC->libreta }}" target="_blank" class="btn btn-success active" role="button" data-toggle="tooltip" data-placement="top"  title="Ver C.V."><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                        @else 
                                            <i class="fa fa-file-text fa-lg" aria-hidden="true"></i>
                                        @endif 

                                        </div>
                                        <div class="col-md-4">
                                            <div data-toggle="tooltip" data-placement="top"  title="Dar de Baja">
                                                <button type="button" class="btn btn-danger"
                                                        data-toggle="modal" 
                                                        data-target="#exampleModal22" 
                                                        data-id="{{ $usuCCC->id }}"
                                                        data-usuario="{{ $usuCCC->ape_paterno }} {{ $usuCCC->ape_materno }} {{ $usuCCC->nombre }}">
                                                        <i class="fa fa-user-times" aria-hidden="true"></i>
                                                </button>
                                            </div> 
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
    <!-- Usuario Dar de Baja -->
    <div class="modal fade" id="exampleModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">               
                <div class="modal-body">                        
                        <div class="panel-group">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 id="exampleModalLabel"><i class="fa fa-graduation-cap" aria-hidden="true"></i> <label class="modal-title"></label></h4>
                                </div>
                            </div>                               
                        </div>
                </div>            
                <div class="modal-footer">

                    {!!Form::open([
                    'name' => 'bajaRude', 
                    'class' => 'modal-bajaRude',   
                    'method'=>'get',
                    'route' =>['Dir.bajaAlm',1]
                    ])!!}                    
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i> Cancelar</button>
                    <button type="submit" class="btn btn-warning"><i class="fa fa-eraser" aria-hidden="true"></i> Aceptar </button>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>


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
