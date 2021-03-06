@extends('layouts_sisccc.pagsis_docentes')
@section('titulo','Administración Personal')
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
@include('layouts_administracion.partials.menu')   
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
            <li><a href="/dirección/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Listado de Administrativos</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <section class="col-lg-12 connectedSortable ui-sortable">
                <div class="box box-primary">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Personal Administrativo</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Rol</th>
                                <th>Nombre</th>                                
                                <th>Info.</th>                                                                        
                            </tr>
                        </thead>                                                   
                        <tbody>
                            <?php $aux = 1 ?>
                            @foreach($l1 as $Personal)
                            <tr>
                                <td>{{ $aux++ }}</td>                                                                         
                                <td><div class="col-md-2 text-left">                                        
                                        <span class="nomProf">{{ $Personal->tipo_Usu }}</span>
                                </div>
                                </td>    
                                <td>
                                    <div class="col-md-4">                                            
                                            <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Personal->id, 35) ?>
                                    </div>                                  

                                    <div class="col-md-8 text-left">                                        
                                        <span class="nomProf">{{ $Personal->nombre }}</span><br/> 
                                        <span class="apeProf">{{ $Personal->ape_paterno }} {{ $Personal->ape_materno }}</span>
                                    </div>    
                                </td>
                                <td>
                                    <button>
                                    
                                    <a href="{{ route('Admtr.cuadSeguiPersonal',$Personal->id) }}"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a>                                         
                                    
                                    </button>                                    
                                </td>
                            </tr>
                            @endforeach  

                            </tbody>
                    </table>
                </div> 
            </section>
        </div>

        
    </section>
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
