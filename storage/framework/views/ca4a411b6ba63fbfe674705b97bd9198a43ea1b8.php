
<?php $__env->startSection('titulo','Administración'); ?>	
<?php $__env->startSection('usuccc'); ?>
<?php echo e($usuactivo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('usuico'); ?>
<i class="fa fa-desktop  fa-2x"></i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('usuico-peq'); ?>
<i class="fa fa-desktop fa-lg"></i>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sis_menu_lateral'); ?>
<?php echo $__env->make('layouts_administracion.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sis_alm_inscritos'); ?>
<?php echo $__env->make('layouts_sisccc.partials.pagsis_alm_insc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sis_contenido'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">    	
    <!-- Content Header (Page header) -->
    <section class="content-header">      
        <h1>
            Escritorio:
            <small>Bienvenido!!!</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('Admtr.Reg')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
    </section>    

    <section class="content admTra">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Opciones de Administración</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>                
                </div>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>Coordinador</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-code-fork"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                 
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-teal">
                            <div class="inner">
                                <h3>Docentes</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-id-card-o"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                  
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-4"> 
                        <div class="small-box bg-maroon">
                            <div class="inner">
                                <h3>Estudiantes</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-graduation-cap"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                  
                    </div>


                    <div class="col-xs-12 col-sm-6 col-md-3"> 
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>Secreatría</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-pencil"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3"> 
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>Regencia</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-book"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                 
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3">                         
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>Capellania</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-puzzle-piece"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-3"> 
                        <div class="small-box bg-blue-gradient">
                            <div class="inner">
                                <h3>Psicología</h3>
                            </div>
                            <div class="icon">
                                <i class="fa fa-support"></i>
                            </div>
                            <a href="#" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
                        </div>                 
                    </div>


                </div>

            </div>
        </div>

        <?php if(isset($CantAlm)): ?>
        <?php echo $__env->yieldContent('sis_alm_inscritos'); ?>
        <?php endif; ?>

        <div class="row">
            <?php if($CantAlm["totalAlum"] == 0): ?>
            <div class="col-md-12">
                <h3 style="text-align: center">No se tiene alumnos Inscritos en la Gestión - <?php echo e($Gestion); ?></h3>
            </div>
            <?php else: ?>            
            <div class="col-md-8">
                <!-- AREA CHART -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Alumnos Inscritos por Día - Gestión <?php echo e($Gestion); ?></h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>                
                        </div>
                    </div>                    
                  
                    <div class="box-body">
                        <div class="chart">
                            <canvas id="areaChart" style="height:250px"></canvas>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
            
            <!-- /.box -->
            <div class="col-md-4">
                <!-- DONUT CHART -->
                <div class="box box-danger dona">
                    <div class="box-header with-border">
                        <h3 class="box-title">% de Alumnos Inscritos - Gestión <?php echo e($Gestion); ?></h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>                         
                        </div>
                    </div>
                    
                    <div class="box-body">
                        <canvas id="pieChart" style="height:350px"></canvas>
                        <hr>
                        <div class="alert alert-info" role="alert">Total de Alumnos: <span class="total"><?php echo e($CantAlm["totalAlum"]); ?></span> </div>
                    </div>
                    
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            
            <?php endif; ?>
            
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
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>      
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_sisccc.pagsis', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>