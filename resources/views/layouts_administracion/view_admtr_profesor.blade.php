@extends('layouts_sisccc.pagsis')
@section('titulo','Administración - Profesores')	
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

        {!! Breadcrumbs::render() !!}
    </section>  


    <section class="content">        
        <div class="row">
                <div class="col-md-8 col-md-push-2">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Profesores</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>                                                                  
                                    <th>Nombre</th>
                                    <th>C.V.</th>                                                                        
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
                                        @if(($Alumno->libreta!='') || ($Alumno->libreta!=null))
                                        <div data-toggle="tooltip" data-placement="top" title="Ver C.V.">
                                            <a href="{{ $Alumno->libreta }}" class="btn btn-yahoo" target="_blank"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a> 
                                        </div>
                                        @else                                                                                                                        
                                            <i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a> 
                                        @endif 
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
