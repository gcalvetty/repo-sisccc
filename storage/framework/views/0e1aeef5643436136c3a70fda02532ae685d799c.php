<?php $__env->startSection('titulo','Dirección'); ?>
<?php $__env->startSection('usuccc'); ?>
<?php echo e($usuactivo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('usuico'); ?>
<i class="fa fa-skyatlas fa-3x"></i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('usuico-peq'); ?>
<i class="fa fa-skyatlas fa-lg"></i>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sis_menu_lateral'); ?>
<?php echo $__env->make('layouts_direccion.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sis_contenido'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Perfil del Usuario
        </h1>
        <?php echo Breadcrumbs::render('Dir.perfil'); ?>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="<?php echo e(asset('imagenes/avatar/user-ccc-peq.png')); ?>" alt="Foto del Perfil de Usuario">

                        <h3 class="profile-username text-center"><?php echo $__env->yieldContent('usuccc'); ?></h3>
                        <p class="text-muted text-center"><?php echo $__env->yieldContent('titulo'); ?></p>             
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">              
                        <li class="active"><a href="#datos-ccc" data-toggle="tab">Modificar Datos</a></li>
                        <li><a href="#imagen-ccc" data-toggle="tab">Modificar Imagen</a></li>
                    </ul>
                    <div class="tab-content">              
                        <div class="active tab-pane" id="datos-ccc">
                            <?php echo e(Form::open(['route' =>$ruta1,'method'=>'PUT'])); ?>

                                <?php echo $__env->make('layouts_perfil.partials.dato', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo e(Form::close()); ?>                            
                        </div>
                        <!-- /.tab-datos -->  
                        <div class="tab-pane" id="imagen-ccc">
                            <?php echo e(Form::open(['route' =>$ruta2, 'method'=>'POST'])); ?>

                            <?php echo $__env->make('layouts_perfil.partials.foto', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <?php echo e(Form::close()); ?>

                        </div>  
                        <!-- /.tab-imagen -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
<footer class="main-footer">   
    <?php echo Html::footer('siscccConfig.pie'); ?>

</footer>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu-configuracion'); ?>
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
            <h3 class="control-sidebar-heading">Actividades Recientes2</h3>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_sisccc.pagsis', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>