@extends('layouts_sisccc.pagsis')
@section('titulo','Administración')	
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
@include('layouts_administracion.partials.menu')
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

        {!! Breadcrumbs::render('Admtr.listalumnos') !!}
    </section>  


    <section class="content">        
        <div class="row">
                <div class="col-md-10 col-md-push-1">

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
                                    <th>Apoyos</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $aux = 1 ?>
                                @foreach($Lista as $Alumno)
                                <tr>
                                    <td>{{ $aux++ }}</td>                                                                         
                                    <td>
                                        <div class="col-md-2">                                            
                                                <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 35) ?>
                                        </div>
                                        <div class="col-md-9 text-left">
                                            <b>{{ $Alumno->ape_paterno.' '.$Alumno->ape_materno.' '.$Alumno->nombre }}
                                        </div>
                                    </td>
                                    <td>                                                
                                            {{ $Alumno->curso }} - {{ $Alumno->aula }}    
                                    </td>
                                    @if ($Alumno->estado == "No Inscrito")
                                    <td>
                                        <a href="#" target="_blank" class="btn btn-danger disabled">                                            
                                                <i class="fa fa-bell" aria-hidden="true"> En Mora</i></a>
                                    </td>
                                    @else
                                    <td>
                                        <div class="col-md-4" data-toggle="tooltip" data-placement="top" title="Imprimir RUDE">
                                            <a href="{{ route('rude-adm.imprimir', ['alumno' => $Alumno->id]) }}" target="_blank" class="btn btn-vimeo">
                                                <i class="fa fa-print  fa-fw" aria-hidden="true"></i></a>
                                        </div>    
                                        <div class="col-md-4"  data-toggle="tooltip" data-placement="top"  title="Ver Libreta">
                                            @if ($Alumno->libreta !='')
                                            <a href="{{ $Alumno->libreta }}" class="btn btn-yahoo" target="_blank"><i class="fa fa-file-pdf-o fa-fw" aria-hidden="true"></i></a>                                        
                                            @else
                                            <i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>
                                            @endif
                                        </div>
                                        <div class="col-md-4" data-toggle="tooltip" data-placement="top"  title="Ver Acceso">
                                            <button type="button" class="btn btn-facebook"
                                                    data-toggle="modal" 
                                                    data-target="#exampleModal20" 
                                                    data-usuario="{{ $Alumno->email }}"
                                                    data-alumno="{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}">
                                                <i class="fa fa-sign-in fa-fw" aria-hidden="true"></i></button>
                                        </div>

                                    </td>
                                    @endif
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
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>  

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
