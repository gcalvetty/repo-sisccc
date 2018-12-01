@extends('layouts_sisccc.pagsis_cal_actividad')
@section('titulo','Secretaria')
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
            <li><a href="/direccion/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content" id="Secr_actividad">

        <!-- Default box -->
        <div class="row">            
            <div class="col-md-12" id="verTareas"> 
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-thumb-tack"></i>
                        <h3 class="box-title">Actividades</h3>                        
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="simple" class="table table-stripe table-hover">
                                <thead> 
                                    <tr>                                                                                
                                        <th>Fecha</th> 
                                        <th>Titulo</th>                                                  
                                    </tr> 
                                </thead>
                                <tbody v-for="com in listado">
                                    <tr scope="row">                                        
                                        <td v-if="com.act_fec!=com.act_fecfin">@{{ com.act_fecini2}}. <b>al</b> @{{ com.act_fecfin2}}.</td>
                                        <td v-else>@{{ com.act_fecini2}}.</td>
                                        <td>@{{ com.act_titulo }}</td>                                        
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </section> 
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    {!! Html::footer('siscccConfig.pie') !!}
</footer>
@endsection

@section('menu-configuracion')

@endsection	
