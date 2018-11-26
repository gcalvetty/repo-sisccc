
<?php $__env->startSection('sis_menu_lateral'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php echo $__env->yieldContent('usuico'); ?>
            </div>
            <div class="pull-left info">
                <p><?php echo $__env->yieldContent('usuccc'); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
        </div>
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú del Contador</li>
            <li class="active">
                <a href="<?php echo e(route('Cont.Reg')); ?>">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Alumnos</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo e(route('Cont.Reg')); ?>?tot=si">Todos los Alumnos</a></li>
                    <?php $__currentLoopData = $Niveles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                         
                    <li>
                        <a href="<?php echo e(route('Cont.Reg')); ?>/alumnos/nivel/<?php echo e($Nivel->grd_nivel_id); ?>"> <?php echo e($Nivel->grd_nivel_nombre); ?>

                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">(<?php echo e(count($Nivel->Cursos)); ?>)</small>
                            </span>
                        </a> 
                    </li>                            
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    

                </ul>
            </li> 
             

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>    
<?php $__env->stopSection(); ?>	
