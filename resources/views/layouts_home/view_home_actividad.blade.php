@extends('layouts_sisccc.pag_home_actividad')
@section('titulo','Actividades')

@section('home_menu')
@include('layouts_home.partials.home_menu')
@endsection	

@section('home_footer')
@include('layouts_home.partials.home_footer')
@endsection

@section('home_contenido')
<div class="academy-courses-area section-padding-100-0">
    <div class="container">
        <div class="row">
            <!-- Single Course Area -->
            <div class="col-10 col-sm-10 col-lg-10 col-md-offset-1 col-sm-offset-1 col-lg-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="box-title"><i class="fa fa-binoculars"></i> Actividades</h3>
                    </div>
                    <div class="panel-body"> 
                        <div id="calendario"></div>
                    </div>                     
                </div>             
            </div>                    
        </div>
    </div>
</div> 

@endsection

@section('home_actividad')
<?php
$col2 = array('#08D85A', '#93C572', '#3ded97', '#8DB600'); // verde        
?>
@foreach($ListaA as $Act)
<?php
$date = date_create($Act->act_fec);
$dateend = date_create($Act->act_fecfin);
$fecha = date_format($date, 'Y-m-d');
$fechaend = date_format($dateend, 'Y-m-d');
$random_col = rand(0, 3);
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




