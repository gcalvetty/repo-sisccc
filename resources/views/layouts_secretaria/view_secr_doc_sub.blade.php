@extends('layouts_sisccc.pagsis_secretaria_subirarchivo')
@section('titulo','Secretaría | Subir Libreta')
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
            Subir Documento:            
        </h1> 

        {!! Breadcrumbs::render() !!}
    </section>  


    <section class="content">
        <div class="row">
            <div class="col-md-8 col-xs-push-2">
                <div class="panel panel-success">
                    <div class="panel-heading">Subir el Documento de: <b>{{ $usuNombre }}</b></div>
                        <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Subir PDF: <i class="fa fa-file-pdf-o" aria-hidden="true"></i></div>
                                <div class="panel-body">
                                    {!! Form::open(['route'=>'Secr.subirdocPdf','files'=>true]) !!}
                                    @include('layouts_secretaria.partials.form_doc')
                                    {!! Form::close() !!}
                                </div>
                            </div>
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                    </div>
                </div>    
            </div>    
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

