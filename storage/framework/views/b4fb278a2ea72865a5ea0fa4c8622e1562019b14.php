
<?php $__env->startSection('titulo','psicolog@'); ?>	
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
<?php echo $__env->make('layouts_psico.partials.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
            <li><a href="/direccion/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Escritorio</li>
        </ol>
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
                                    <th>ID</th>
                                    <th>Curso</th>
                                    <th>Nombre</th> 
                                    <th>Apellido</th> 
                                    <th>Conducta</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $Lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($Alumno->id); ?></td>  
                                    <td><?php echo e($Alumno->curso); ?> - <?php echo e($Alumno->aula); ?></td>
                                    <td><?php echo e($Alumno->nombre); ?> </td>
                                    <td>    
                                    <?php echo e($Alumno->ape_paterno); ?> <?php echo e($Alumno->ape_materno); ?> </td>
                                    <td>
                                        <button type="button" class="btn btn-danger" 
                                                data-toggle="modal" 
                                                data-target=".bs-example-modal-lg"
                                                data-idalm="<?php echo e($Alumno->id); ?>"
                                                data-nomalm=" <?php echo e($Alumno->nombre); ?> <?php echo e($Alumno->ape_paterno); ?> <?php echo e($Alumno->ape_materno); ?>">
                                            <i class="fa fa-edit"></i></button>
                                    </td>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                </tr>

                                </tfoot>
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

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="EstudianteModal">
        <div class="modal-dialog" role="document" id="Comportamiento">            
            <form v-on:submit="validateBeforeSubmit" class="form-horizontal" role="form" action="<?php echo e(route('Psico.insCom')); ?>">    
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel">Comportamiento del Alumn@: <span class="Alm"></span></h4>
                    </div>
                    <div class="modal-body" > 
                         <div class="col-lg-12">   
                            <div class="form-group has-feedback <?php echo e($errors->has('fec') ? ' has-error' : ''); ?>" v-bind:class="{'': true, 'has-error': errors.has('fec') }">
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon10"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" id="fec"  name="fec" value="<?php echo e(old('fec')); ?>"  placeholder="Fecha DD/MM/YYYY" aria-describedby="basic-addon10" v-model="fec"  v-validate.initial="fec" data-vv-rules="required|date_format:DD/MM/YYYY" data-vv-delay="200" v-bind:class="{'': true, 'has-error': errors.has('fec') }">
                                </div>
                                <span class="glyphicon  form-control-feedback" aria-hidden="true" v-bind:class="{'': true, 'glyphicon-remove': errors.has('fec') }"></span>
                                <?php if($errors->has('fec')): ?><span class="help-block"><strong><?php echo e($errors->first('fec')); ?></strong></span><?php endif; ?>
                            </div>
                        </div>   
                         <div class="col-lg-12">    

                           
                                <textarea id="editor" name="editor" rows="5" cols="80" 
                                          v-bind:class="{'': true, 'has-error': errors.has('editor') }" 
                                          data-vv-rules="required" >
                                    
                                </textarea>
                           
                        </div>
                        
                        <input class="AlmId" id="AlmId" name="AlmId" value="" hidden="true">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>                        
                        <?php echo Form::submit('Guardar', ['class' => 'btn btn-primary']);; ?>

                    </div>
                </div>
            </form>
        </div>
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

<?php echo $__env->make('layouts_sisccc.pagsis_psico', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>