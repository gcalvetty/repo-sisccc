

<!-- Main Content -->
<?php $__env->startSection('sis_contenido'); ?>

<div class="container inscrForm">
    <?php echo $__env->make('layouts_sisccc/pagsis-msg-reg-alm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('layouts_sisccc/pagsis-error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>            
    <?php echo $__env->make('layouts_sisccc/pagsis-vue-data', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>    
    <?php if(!session('status')): ?>
    <div class="panel panel-success">
        <div class="panel-heading"><i class="fa fa-file-text fa-2x" aria-hidden="true"></i> Buscar Alumno</div>
        <div class="panel-body">

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
                                        <th>Paralelo</th>
                                        <th>Apellido Paterno</th>  
                                        <th>Apellido Materno</th>  
                                        <th>Nombre</th>  
                                        <th>Inscribir</th>                                                                              
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $Lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($Alumno->id); ?></td>  
                                        <td><?php echo e($Alumno->curso); ?></td>
                                        <td><?php echo e($Alumno->aula); ?></td>
                                        <td><b><?php echo e($Alumno->ape_paterno); ?></b></td>
                                        <td><b><?php echo e($Alumno->ape_materno); ?></b></td>
                                        <td><?php echo e($Alumno->nombre); ?>

                                            <br><b>Usuario:</b> <?php echo e($Alumno->email); ?>

                                            <br><b>Contraseña:</b> cccedu
                                        </td>                                        
                                        <td style="text-aling:center">
                                            <a href="<?php echo e(route('rude-ins.edit', ['alumno' => $Alumno->id])); ?>"><i class="fa fa-pencil-square-o   fa-lg" aria-hidden="true"></i></a>
                                        </td>    
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                                    </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts_sisccc.paginscr_bus_antiguo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>