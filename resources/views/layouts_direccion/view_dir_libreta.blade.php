@extends('layouts_sisccc.pagsis')
@section('titulo','Dirección')
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
@include('layouts_direccion.partials.menu')
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
                        <h3 class="box-title">Lista de Alumnos</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>N°</th>
                                    <th>Curso</th>
                                    <th>Paralelo</th>
                                    <th>Alumno</th>
                                    <th>Libreta</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php $aux = 1 ?>
                                    @foreach($Lista as $Alumno)
                                    <tr>
                                        <td>{{ $aux++ }}</td>  
                                        <td>
                                               <div class="col-md-2">                                            
                                                    <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($Alumno->id, 30) ?>
                                                </div>
                                                <div class="col-md-9 text-left">
                                                <b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}
                                                </div>    
                                        </td>
                                        <td>
                                                {{ $Alumno->curso }} - {{ $Alumno->aula }}                                            
                                        </td>
                                    <td><b>{{ $Alumno->ape_paterno }} {{ $Alumno->ape_materno }} {{ $Alumno->nombre }}</td>
                                    <td>
                                        <a href="{{ route('Dir.sublib', ['alumno' => $Alumno->id]) }}"><i class="fa fa-upload" aria-hidden="true"></i></a> 
                                        @if(($Alumno->libreta!='') || ($Alumno->libreta!=null))
                                        &nbsp;<a href="{{ $Alumno->libreta }}" target="_blanck"><i class="fa fa-file-text fa-lg" aria-hidden="true"></i></a> 
                                        @endif   
                                    </td>                                    
                                    @endforeach    
                                </tr>

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

