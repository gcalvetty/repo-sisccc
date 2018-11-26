<?php $__env->startSection('titulo','Contador'); ?>
<?php $__env->startSection('usuccc'); ?>
<?php echo e($usuactivo); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('usuico'); ?>
<i class="fa fa-cubes fa-2x"></i>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('usuico-peq'); ?>
<i class="fa fa-cubes fa-lg"></i>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sis_menu_lateral'); ?>
<?php echo $__env->make('layouts_contador.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        <?php echo Breadcrumbs::render(); ?>

    </section>    

    <section class="content">

        <div id="contador_crud" class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Alumnos Inscritos</h3>                        
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>                                    
                                    <th>Curso</th>
                                    <th>Paralelo</th>
                                    <th>Alumno</th>                                                                        
                                    <th>Adeuda</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $Lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="<?php echo e($Alumno->id); ?>">

                                    <td><?php echo e($Alumno->curso); ?></td>
                                    <td><?php echo e($Alumno->aula); ?></td>
                                    <td><?php echo e($Alumno->ape_paterno); ?> <?php echo e($Alumno->ape_materno); ?> <?php echo e($Alumno->nombre); ?></td>                                    
                                    <td>
                                        
                                        <?php if($Alumno->estado == 'Inscrito'): ?>
                                        <button type="button" class="actbot btn btn-danger btnbloq<?php echo e($Alumno->id); ?>" v-on:click.prevent="bloqAlm(<?php echo e($Alumno->id); ?>);">                                                                                        
                                            <i class="fa fa-unlock-alt" aria-hidden="true"> Bloquear</i>
                                        </button>
                                        <?php else: ?>
                                        <button type="button" class="desbot btn btn-danger btnbloq<?php echo e($Alumno->id); ?>" v-on:click.prevent="bloqAlm(<?php echo e($Alumno->id); ?>);">                                                                                        
                                            <i class="fa fa-unlock-alt" aria-hidden="true"> Bloquear</i>
                                        </button>
                                        <?php endif; ?>
                                        
                                        
                                        <?php if($Alumno->estado != 'Inscrito'): ?>
                                        <button type="button" class="actbot btn btn-success btndesbloq<?php echo e($Alumno->id); ?>" v-on:click.prevent="desbloqAlm(<?php echo e($Alumno->id); ?>)">
                                            <i class="fa fa-unlock" aria-hidden="true"> DesBloquear</i>
                                        </button>
                                        <?php else: ?> 
                                        <button type="button" class="desbot btn btn-success btndesbloq<?php echo e($Alumno->id); ?>" v-on:click.prevent="desbloqAlm(<?php echo e($Alumno->id); ?>)">
                                            <i class="fa fa-unlock" aria-hidden="true"> DesBloquear</i>
                                        </button>
                                        <?php endif; ?>
                                        
                                    </td>                                    
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
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
</div>    

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
            <h3 class="control-sidebar-heading">Actividades Recientes</h3>
        </div>
    </div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts_sisccc.pagsis_contador', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>