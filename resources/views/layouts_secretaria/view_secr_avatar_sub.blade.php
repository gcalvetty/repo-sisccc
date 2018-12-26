@extends('layouts_sisccc.pagsis_secretaria_avatar')
@section('titulo','Secretaría | Subir Avatar')
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
        <h1>Subir Avatar</h1> 
        {!! Breadcrumbs::render() !!}
    </section>  


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <?php echo sis_ccc\libreriaCCC\fncCCC::getAvatar($idUsu, 30); ?>                        
                        <b>{{ $usuNombre }}</b></div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-4 text-center">
                                <div id="upload-demo">                                        
                                </div>
                            </div>
                            <div class="col-md-4" style="padding:5%;">
                                <strong>Seleccionar una Imagen:</strong>
                                <input type="file" id="image_file">
                                <button id="guardarBot" name="guardarBot" disabled="disabled" class="btn btn-primary btn-block upload-image" style="margin-top:2%">Guardar Imagen</button>                            
                            </div>
                            <div class="col-md-4">
                                <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
                            </div>                            
                        </div>
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

