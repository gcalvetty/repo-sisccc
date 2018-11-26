<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo app('translator')->getFromJson('auth.titReg'); ?></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/register')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('nombre') ? ' has-error' : ''); ?>">
                            <label for="name" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.nom'); ?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('nombre')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('nombre')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('ape_paterno') ? ' has-error' : ''); ?>">
                            <label for="ape1" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.ape1'); ?></label>

                            <div class="col-md-6">
                                <input id="ape1" type="text" class="form-control" name="ape1" value="<?php echo e(old('ape1')); ?>" required>

                                <?php if($errors->has('ape_paterno')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('ape_paterno')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('ape_materno') ? ' has-error' : ''); ?>">
                            <label for="ape2" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.ape2'); ?></label>

                            <div class="col-md-6">
                                <input id="ape2" type="text" class="form-control" name="ape2" value="<?php echo e(old('ape2')); ?>">

                                <?php if($errors->has('ape_materno')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('ape_materno')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.mail'); ?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required>

                                <?php if($errors->has('email')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.clv'); ?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                            <label for="password-confirm" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.clvCnf'); ?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                <?php if($errors->has('password_confirmation')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                        </div>


                        <div class="form-group<?php echo e($errors->has('tipo_Usu') ? ' has-error' : ''); ?>">
                            <label for="rol" class="col-md-4 control-label"><?php echo app('translator')->getFromJson('auth.tUsu'); ?></label>

                            <div class="col-md-6">
                                <select class="form-control" id="tipo_Usu" name='tipo_Usu'>                                    
                                    <option value="Dir">Director</option>
                                    <option value="Prof">Profesor</option>
                                    <option value="Cont" class="hidden">Contador</option>
                                    <option value="Secr">Secretaría</option>
                                    <option value="Rege">Regencia</option>
                                    <option value="JPer" class="hidden">Personal de planta</option>
                                </select>

                                <?php if($errors->has('tipo_Usu')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('tipo_Usu')); ?></strong>
                                </span>
                                <?php endif; ?>

                            </div>
                        </div>    


                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?php echo app('translator')->getFromJson('auth.botReg'); ?>
                                    </button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>