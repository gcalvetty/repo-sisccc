@extends('layouts_sisccc.pagsis')
@section('titulo','Secretaría | Libreta')
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
@include('layouts_secretaria.partials.menu')
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
                        <h3 class="box-title">Lista de Personal</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Avatar</th>                                                                            
                                    <th>C.V.</th>
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
                                        <a href="{{ route('Secr.subAvatar', ['idUsu' => $usuCCC->id,'opc'=>2]) }}"><i class="fa fa-upload" aria-hidden="true"></i></a>
                                    </td>
                                    <td>                                            
                                        <a href="{{ route('Secr.subdoc', ['idUsu' => $usuCCC->id]) }}"><i class="fa fa-upload" aria-hidden="true"></i></a> 
                                        @if(($usuCCC->libreta!='') || ($usuCCC->libreta!=null))
                                        &nbsp;<a href="{{ $usuCCC->libreta }}" target="_blanck"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
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
