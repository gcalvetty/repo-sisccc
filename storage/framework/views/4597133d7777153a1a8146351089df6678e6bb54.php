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
<?php echo $__env->make('layouts_direccion.partials.menu_edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>	

<?php $__env->startSection('sis_contenido'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio:
            <small>Editar</small>
        </h1>
        <?php echo Breadcrumbs::render(); ?>

    </section>    

    <section class="content editarRegAlm">        
        <div class="row ">
            <div  class="container inscripcion inscrForm col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">Formulario [<?php echo $__env->yieldContent('titulo'); ?>]</div> 
                    <div class="panel-body">
                        <?php echo $__env->make('layouts_sisccc/pagsis-msg-reg-alm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <?php echo $__env->make('layouts_sisccc/pagsis-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
                        <?php echo $__env->make('layouts_sisccc/pagsis-vue-data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div id="app" class="container-fluid"> 
                            <form v-on:submit="validateBeforeSubmit" class="form-horizontal" role="form" method="PUT" action="<?php echo e(route('rude-d.update', ['alumno' => $Alumno->user_id])); ?>">
                                <?php echo e(csrf_field()); ?>

                                <?php echo $__env->make('layouts_sisccc.partials.pagsis_edit_rude', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>                   
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div>


    </section>


    <!-- /.content -->

</div>
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