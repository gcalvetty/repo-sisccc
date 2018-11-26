<?php if(!$errors ->isEmpty()): ?>
<div class="alert alert-danger">
    <p><strong>Lo Siento !!!</strong> hay varios campos que necesitan ser corrregidos;</p>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </ul>
    <?php echo e(session('status')); ?>

</div>
<?php endif; ?>
