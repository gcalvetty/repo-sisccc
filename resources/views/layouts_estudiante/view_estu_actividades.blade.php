@extends('layouts_sisccc.pagsis_estudiante_actividad')
@section('titulo','Estudiante')
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
@include('layouts_estudiante.partials.menu')   
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
            <li><a href="/estudiante/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <section class="col-lg-8 col-md-8 col-sm-12 col-md-push-2 col-lg-push-2 connectedSortable ui-sortable">
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-binoculars"></i>
                        <h3 class="box-title">Actividades</h3>
                    </div>
                    <div class="box-body">    
                        <div id="calendario"></div>
                    </div>    
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
@section('sis_actividad')
    <?php 
        $col2 = array('#3cb043','#3a5311','#32612d','#3ded97','#028a0f'); // verde
        $col1 = array('#ed7014','#b56727','#8d4004','#fc6a03','#c95b0c','#893101'); // naranja
     ?>
    @foreach($ListaC as $Comu)
        <?php
            $date = date_create($Comu->com_fec);
            $fecha = date_format($date, 'Y-m-d');
            $random_col=rand(0,4);
            $rmdCol = $col1[$random_col];
        ?>
        {
            title: '{{ $Comu->com_titulo }}', // --- Comunicado ---
            start: '{{ $fecha }}', 
            end:   '{{ $fecha }}',
            constraint: 'availableForMeeting',
            backgroundColor: '{{ $rmdCol }}', //
            borderColor: '{{ $rmdCol }}' //
        },                                    
    @endforeach
    
    @foreach($ListaA as $Act)
        <?php
            $date = date_create($Act->act_fec);
            $dateend = date_create($Act->act_fecfin);
            $fecha = date_format($date, 'Y-m-d');
            $fechaend = date_format($dateend, 'Y-m-d');            
            $random_col=rand(0,4);
            $rmdCol = $col2[$random_col];
            
        ?>
        {
            id: {{ $Act->act_id }},
            title: '{{ $Act->act_titulo }}', // --- Actividad ---
            start: '{{ $fecha }}',  
            end:   '{{ $fechaend }}', 
            constraint: 'businessHours',
            backgroundColor: '{{ $rmdCol }}', //
            borderColor: '{{ $rmdCol }}' //
        },                                    
    @endforeach
@endsection
<!-- Control Sidebar -->