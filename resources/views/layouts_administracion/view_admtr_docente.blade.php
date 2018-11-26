@extends('layouts_sisccc.pagsis_docentes')
@section('titulo','Administración Docente')
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
            <li class="active">Escritorio</li>
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
            <section class="col-lg-4 connectedSortable ui-sortable">
                <div class="box box-primary">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Sección</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profesor</th>
                                <th>Paralelo</th>
                                <th>Acciones</th>                                                                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($l1 as $Prof1)
                            <tr>
                                <td>{{ $Prof1->id }}</td>                                      
                                <td>{{ $Prof1->nombre }}, {{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}
                                </td>

                                <td>
                                    A                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success"><i class="fa fa-address-book-o"></i></button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></button>
                                </td>
                            </tr>
                            @endforeach  

                            </tfoot>
                    </table>
                </div> 
            </section>

            <section class="col-lg-4 connectedSortable ui-sortable">
                <div class="box box-success">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Primaria</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profesor</th>
                                <th>Paralelo</th>
                                <th>Acciones</th>                                                                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($l2 as $Prof1)
                            <tr>
                                <td>{{ $Prof1->id }}</td>                                      
                                <td>{{ $Prof1->nombre }}, {{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}
                                </td>

                                <td>
                                    A                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success"><i class="fa fa-address-book-o"></i></button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></button>
                                </td>
                            </tr>
                            @endforeach  

                            </tfoot>
                    </table>
                </div> 
            </section>

            <section class="col-lg-4 connectedSortable ui-sortable ">
                <div class="box box-info">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Secundaria</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profesor</th>
                                <th>Paralelo</th>
                                <th>Acciones</th>                                                                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($l3 as $Prof1)
                            <tr>
                                <td>{{ $Prof1->id }}</td>                                      
                                <td> {{ $Prof1->nombre }}, {{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}
                                </td>

                                <td>
                                    A                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success"><i class="fa fa-address-book-o"></i></button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></button>
                                </td>

                            </tr>
                            @endforeach  

                            </tfoot>
                    </table>
                </div> 
            </section>


        </div>

        <div class="row">
            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-title">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Taller Inicial</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profesor</th>
                                <th>Paralelo</th>
                                <th>Acciones</th>                                                                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($l4 as $Prof1)
                            <tr>
                                <td>{{ $Prof1->id }}</td>                                      
                                <td>{{ $Prof1->nombre }}, {{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}
                                </td>

                                <td>
                                    A                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success"><i class="fa fa-address-book-o"></i></button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></button>
                                </td>

                            </tr>
                            @endforeach  

                            </tfoot>
                    </table>
                </div> 
            </section>

            <section class="col-lg-6 connectedSortable ui-sortable">
                <div class="box box-danger">
                    <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa fa-comments-o"></i>

                        <h3 class="box-title">Docentes - Sin Asignación</h3>

                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Profesor</th>
                                <th>Paralelo</th>
                                <th>Acciones</th>                                                                        
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($l0 as $Prof1)
                            <tr>
                                <td>{{ $Prof1->id }}</td>                                      
                                <td>{{ $Prof1->nombre }}, {{ $Prof1->ape_paterno }} {{ $Prof1->ape_materno }}</b>
                                </td>

                                <td>
                                    A                                    
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success"><i class="fa fa-address-book-o"></i></button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-file-pdf-o"></i></button>
                                </td>

                            </tr>
                            @endforeach  
                            </tfoot>
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
