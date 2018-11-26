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
        
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">Menú del Profesor</li>
            <li class="active">
                <a href="/profesor/">
                    <i class="fa fa-th"></i> <span>Escritorio</span>            
                </a>
            </li>
            
            <li>
                <a href="<?php echo e(route('Prof.actividades')); ?>">
                    <i class="fa  fa-pencil-square-o"></i> <span>Actividades Escolares</span>                    
                </a>
            </li> 
            
            <li>
                <a href="<?php echo e(route('Prof.cuadSegui')); ?>">
                    <i class="fa  fa-list-ol"></i> <span>Cuaderno de Seguimiento</span>                    
                </a>
            </li>
            
            <li class="disable">
                <a href="<?php echo e(route('Prof.agenda')); ?>">
                    <i class="fa  fa-calendar-check-o"></i> <span>Calendario de Actividades</span>                    
                </a>
            </li>
            
            <li class="treeview disabled hidden">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Comportamiento</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Llamadas de atencion</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Observaciones</a></li>
                </ul>
            </li>                       
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>  