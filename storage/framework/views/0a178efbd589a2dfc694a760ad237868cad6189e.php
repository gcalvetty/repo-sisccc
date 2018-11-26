

<!-- Main Content -->
<?php $__env->startSection('sis_contenido'); ?>

<div  class="container inscrForm">    
    
        <?php echo $__env->make('layouts_inscripcion/pagsis-msg-iniInsc', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts_sisccc.paginscr', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>