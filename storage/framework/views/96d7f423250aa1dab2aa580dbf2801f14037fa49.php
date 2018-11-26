<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name')); ?></title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">       

        <!-- Favicon -->        
        <link rel="apple-touch-icon" sizes="76x76" href="/imagenes/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/imagenes/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/imagenes/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/imagenes/favicon/manifest.json">
        <link rel="mask-icon" href="/imagenes/favicon/safari-pinned-tab.svg" color="#385c27">
        <meta name="msapplication-TileColor" content="#7cba5f">
        <meta name="theme-color" content="#7cba5f">
        <meta name="google-site-verification" content="TMCJ84VbGNP_H5cHT4uBHnMKj0lKeK0yYNPNw1wBgXU" />
        <title><?php echo e(config('app.name', 'CCC-SIS')); ?></title>

        <!-- Styles -->
        <link href="/dist/css/AdminLTE.css" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/sisccc.css" rel="stylesheet">     


        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
        </script>
    </head>
    <body>
        <div class="navbar-wrapper">
            <div class="container">
                <?php echo Html::menuHome(); ?>  
            </div>
        </div> 
        <?php if(Auth::guest()): ?> 
        <div class="home-cont1">                                
            <?php $__env->startComponent('layouts_sisccc.pag_home_invitado'); ?>
            
            <?php echo $__env->renderComponent(); ?>
        </div>
            <?php $__env->startComponent('layouts_sisccc.pag_home_footer'); ?>
            
            <?php echo $__env->renderComponent(); ?>            
        <?php else: ?>
        <div class="home-cont2">                                  
            <?php $__env->startComponent('layouts_sisccc.pag_home_logeado'); ?>
            
            <?php echo $__env->renderComponent(); ?>
        </div>
            <?php $__env->startComponent('layouts_sisccc.pag_home_footer'); ?> 
            
            <?php echo $__env->renderComponent(); ?>
            <?php $__env->startComponent('layouts_sisccc.partials.pagsis_home_script'); ?>
            
            <?php echo $__env->renderComponent(); ?>
        <?php endif; ?>
    </body>
</html>
