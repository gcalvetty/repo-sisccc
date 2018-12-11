@extends('layouts_sisccc.pag_home_comunicado')
@section('titulo','Comunicados')

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
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="box-title"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Comunicados</h3>
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
$col1 = array('#f8de7e','#fcf4a3','#ffe5b4','#ffddaf','#fcd12a','#effd5f'); // naranja  
?>
@foreach($ListaC as $Comu)
        <?php
            $date = date_create($Comu->com_fec);
            $fecha = date_format($date, 'Y-m-d');
            $random_col=rand(0,5);
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
@endsection




