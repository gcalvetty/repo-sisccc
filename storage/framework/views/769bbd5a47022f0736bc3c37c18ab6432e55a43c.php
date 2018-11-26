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

        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Bad+Script" rel="stylesheet">
        <!-- CSRF Token -->

        <!-- Favicon -->        
        <link rel="apple-touch-icon" sizes="76x76" href="/imagenes/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/imagenes/favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/imagenes/favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/imagenes/favicon/manifest.json">
        <link rel="mask-icon" href="/imagenes/favicon/safari-pinned-tab.svg" color="#385c27">
        <meta name="msapplication-TileColor" content="#7cba5f">
        <meta name="theme-color" content="#7cba5f">
        <title><?php echo e(config('app.name', 'CCC-SIS')); ?></title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/sisccc.css" rel="stylesheet">
        <link href="/css/sisccc-insc.css" rel="stylesheet">

        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="/plugins/datepicker/datepicker3.css"> 
        
    </head>
    <body> 
        <div class="navbar-wrapper">
            <div class="container">
                <?php echo Html::menuHome(); ?> 
            </div>
        </div> 
        
        <?php echo $__env->yieldContent('sis_contenido'); ?>        

        <!-- Webpack -->        
        <script src="/js/app.js" type="text/javascript"></script>        
        <script src="/jquery/moment.js" type="text/javascript"></script>
        <script src="/jquery/vue.js" type="text/javascript"></script>        
        <script src="/jquery/vee-validate.js" type="text/javascript"></script>
        
        <!-- Vue variables -->
        <script src="/jquery/ccc-inscripcion.js"></script>
        <script>
           
const app = new Vue({    
    el: '#app',
    validator: null, // private reference
    data() {
        return {
            // -------------
            ape_paterno: "<?php echo e(old('ape_paterno')); ?>",    
            ape_materno: "<?php echo e(old('ape_materno')); ?>",    
            nombre: "<?php echo e(old('nombre')); ?>",
            cod_rude: "<?php echo e(old('cod_rude')); ?>",
            // -------------
            pais: "<?php echo e(old('pais')); ?>",   
            departamento: "<?php echo e(old('departamento')); ?>",   
            provincia: "<?php echo e(old('provincia')); ?>",  
            localidad: "<?php echo e(old('localidad')); ?>",
            // -------------
            tip_doc: "<?php echo e(old('tip_doc')); ?>",    
            num_doc: "<?php echo e(old('num_doc')); ?>", 
            fec_nac: "<?php echo e(old('fec_nac')); ?>",    
            sexo: "<?php echo e(old('sexo')); ?>",
            
            // -------------
            ofc_num: "<?php echo e(old('ofc_num')); ?>",    
            lib_num: "<?php echo e(old('lib_num')); ?>",    
            par_num: "<?php echo e(old('par_num')); ?>",    
            fol_num: "<?php echo e(old('fol_num')); ?>",
            rue_num:"<?php echo e(old('rue_num')); ?>",
            rue_nom:"<?php echo e(old('rue_nom')); ?>",
            
            // -------------
            optCurso: "<?php echo e(old('optCurso')); ?>",

            // -------------
            dir_prov: "<?php echo e(old('dir_prov')); ?>",   
            municipio: "<?php echo e(old('municipio')); ?>",  
            loc_comn: "<?php echo e(old('loc_comn')); ?>",
            zn_villa: "<?php echo e(old('zn_villa')); ?>",   
            av_calle: "<?php echo e(old('av_calle')); ?>",   
            telf: "<?php echo e(old('telf')); ?>",
            cel: "<?php echo e(old('cel')); ?>",
            num_viv: "<?php echo e(old('num_viv')); ?>",
            
            // -------------
            idi_est:"<?php echo e(old('idi_est')); ?>", 
            idihab1_est:"<?php echo e(old('idihab1_est')); ?>", 
            idihab2_est:"<?php echo e(old('idihab2_est')); ?>", 
            idihab3_est:"<?php echo e(old('idihab3_est')); ?>",
            
            // -------------
            pert_est:"<?php echo e(old('pert_est')); ?>",    
            pert_est_otro:"<?php echo e(old('pert_est_otro')); ?>",
            
            // -------------
            exit_salud_est:"<?php echo e(old('exit_salud_est')); ?>",  
            vec_salud_est:"<?php echo e(old('vec_salud_est')); ?>",   
            disc_est:"<?php echo e(old('disc_est')); ?>",
            dis1:"2",    
            dis2:"2", 
            dis3:"2",   
            discp:"<?php echo e(old('discp')); ?>",
            discp_otro:"<?php echo e(old('discp_otro')); ?>",
            
            //--------------
            ser_agua:"<?php echo e(old('ser_agua')); ?>",    
            elec_est:"<?php echo e(old('elec_est')); ?>",        
            water_est:"<?php echo e(old('water_est')); ?>",            
            
            // -------------
            trab_est:"<?php echo e(old('trab_est')); ?>",    
            dia_trab_est:"<?php echo e(old('dia_trab_est')); ?>",    
            rec_pag_est:"<?php echo e(old('rec_pag_est')); ?>",
            
            // -------------
            internet_est:"<?php echo e(old('internet_est')); ?>", 
            frec_inter_est:"<?php echo e(old('frec_inter_est')); ?>",
            
            transp_esp:"<?php echo e(old('transp_esp')); ?>", 
            trans_otro_est:"<?php echo e(old('trans_otro_est')); ?>", 
            transp_tiempo:"<?php echo e(old('transp_tiempo')); ?>",
            
            // -------------
            ci_tut:"<?php echo e(old('ci_tut')); ?>", 
            ape_tut:"<?php echo e(old('ape_tut')); ?>", 
            nom_tut:"<?php echo e(old('nom_tut')); ?>", 
            idim_tut:"<?php echo e(old('idim_tut')); ?>",
            
            ocp_tut:"<?php echo e(old('ocp_tut')); ?>",
            grd_tut:"<?php echo e(old('grd_tut')); ?>", 
            paren_tut:"<?php echo e(old('paren_tut')); ?>", 
            
            // -------------
            ci_madre:"<?php echo e(old('ci_madre')); ?>",
            ape_madre:"<?php echo e(old('ape_madre')); ?>", 
            nom_madre:"<?php echo e(old('nom_madre')); ?>", 
            idim_madre:"<?php echo e(old('idim_madre')); ?>", 
            ocp_madre:"<?php echo e(old('ocp_madre')); ?>", 
            grd_madre:"<?php echo e(old('grd_madre')); ?>",            
            
            
            // ---- Condicionales ----
            disSel:"<?php echo e(old('disSel')); ?>",
        }
    },
    methods: {
        tipDoc: function () {
            auxtxt = "";
            if (this.tip_doc == "")
            {
                this.num_doc = "";
                auxtxt = "Número ...";

            } else {
                auxtxt = "Número de " + this.tip_doc;
            }
            num_doc.setAttribute("placeholder", auxtxt);
        },
        
        // --------------
        validateBeforeSubmit(e) {
            this.$validator.validateAll();
            if (this.errors.any()) {
                e.preventDefault();
            }
        }
    }
});    
</script>
</body>