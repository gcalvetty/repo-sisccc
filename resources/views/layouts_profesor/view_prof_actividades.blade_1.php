@extends('layouts_sisccc.pagsis_actividad')
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
    <section id="contador_crud"></section>
    <section class="content" id="Prof_actividades">

        <!-- Default box -->
        <div class="row">
            <div class="col-md-4" id="tarea">
                <div class="box box-info">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa  fa-pencil-square-o"></i>
                        <h3 class="box-title">Asignar Tarea</h3>                        
                    </div>
                    <div class="box-body">
                        <form action="#" v-on:submit.prevent="crearTarea" method="post">
                            <select v-model="selected">
                                <option disabled value="">Materia</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                            </select>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" 
                                       name="tar_materia"
                                       v-model="tar_materia"
                                       placeholder="Materia:" value="@{{ selected }}" disabled="true">
                            </div>
                            
                            <span>Selected: </span>


                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" 
                                       name="tar_desc"     
                                       v-model ="tar_desc"
                                       placeholder="Actividad a realizar">
                            </div>
                            <span v-for="error in errors" class="text-danger">
                                @{{ error }}
                            </span> 

                            <div class="box-footer clearfix">                        
                                <input type="submit" class="btn btn-primary" value="Guardar">                             
                            </div>

                        </form>
                    </div>

                </div>
            </div>  

            <div class="col-md-8" id="verTareas">
                <!-- The time line -->                
                <ul class="timeline" v-for="tarea in listado">                    
                    <li class="time-label">
                        <span class="bg-blue">
                            @{{ tarea.tar_fec_ini }}
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-pencil-square-o bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> Entrega el: @{{ tarea.tar_fec_fin }}</span>

                            <h3 class="timeline-header"><a href="#">@{{ tarea.tar_materia}}</a></h3>

                            <div class="timeline-body">
                                @{{ tarea.tar_desc}}
                            </div>                            
                        </div>
                    </li>                    
                </ul>

            </div>

            </ul>
        </div>
        <!-- /.col -->
</div>
<!-- /.box -->

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
