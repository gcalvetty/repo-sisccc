@extends('layouts_sisccc.pagsis_cuaderno_seguimiento')
@section('titulo','Contador | Cuaderno de Actividades')
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
@include('layouts_contador.partials.menu')   
@endsection

@section('sis_contenido')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Cuaderno de Seguimiento
        </h1>
        <ol class="breadcrumb">
            <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Cuaderno de Seguimiento</li>
        </ol>
    </section>

    <!-- Main content -->
    <section id="contador_crud"></section>
    <section class="content" id="Cuad_Seguimiento">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-12" id="verTareas"> 
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-thumb-tack"></i>
                        <h3 class="box-title">Cuaderno de Seguimiento</h3>
                        <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#crear">Nueva Actividad</a>                                             
                    </div>
                   
                    <div class="box-body">                        
                        <div class="table-responsive">
                            <nav>
                                    <ul class="pagination">
                                        <li v-if="paginacion.act_pag > 1">
                                            <a href="#" @click.prevent="cambiarPag(paginacion.act_pag-1)"><span>Atras</span></a>
                                        </li>
                                        <li v-for="page in pagesNumber" v-bind:class="[page == isActived ? 'active':'']">
                                            <a href="#" @click.prevent="cambiarPag(page)">@{{ page }}</a>
                                        </li>                                    
                                        <li  v-if="paginacion.act_pag < paginacion.ult_pag">
                                                <a href="#" @click.prevent="cambiarPag(paginacion.act_pag+1)"><span>Siguiente</span></a>
                                        </li>
                                    </ul>    
                                </nav>   
                            <table id="simple" class="table table-hover table-striped">
                                <thead> 
                                    <tr>                                        
                                        <th class="col-md-2" @click="sort('fecha')">Fecha</th>
                                        <th class="col-md-8">Descripción</th>                                 
                                        <th class="col-md-1">Accion</th> 
                                    </tr> 
                                </thead>
                                <tbody>
                                    <tr v-for="tarea in listado" scope="row" class="text-left">
                                        <td>@{{ modFec(tarea.pc_fec) }}</td>                                        
                                        <td contenteditable="true" >
                                            <div  v-html="tarea.pc_desc" v-bind:id="tarea.pc_id" class="text-left"></div> 
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger" v-on:click.prevent="eliminarSeguimiento(tarea)">
                                                <i class="fa fa-trash-o"> </i>
                                            </button>                                            
                                        </td>
                                    </tr>
                                </tbody>                                
                            </table>
                            
                            @include('layouts_sisccc.partials.pagsis_crear_cuaSeg')
                        </div>
                    </div>
                </div>   
            </div>
        </div>
        <!-- /.col -->
</div>
<!-- /.box -->

</section>
<!-- /.content -->
<footer class="main-footer">
        {!! Html::footer('siscccConfig.pie') !!}
    </footer>
</div>
<!-- /.content-wrapper -->

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
