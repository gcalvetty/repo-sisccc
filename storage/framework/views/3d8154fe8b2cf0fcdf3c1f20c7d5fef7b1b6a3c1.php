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

<button class="btn btn-primary" type="submit">
    <i class="fa fa-floppy-o" aria-hidden="true"></i>
    Guardar
</button>