<div class="container ns panel-body">
    <div class="row">
        <div class="logeado col-lg-10 col-xs-push-1">
            <h1>Usuario, Logeado!!! <?php echo e(session('Ruta-Acceso')); ?></h1>            
            <p><a class="btn btn-primary btn-lg" href="<?php echo e(session('Ruta-Acceso')); ?>" role="button"><i class="fa fa-desktop" aria-hidden="true"></i> <?php echo app('translator')->getFromJson('auth.dashbord'); ?></a></p>
        </div>
    </div><!-- /row -->
</div><!-- Container --> 