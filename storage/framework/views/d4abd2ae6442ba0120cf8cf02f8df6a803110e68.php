<!-- Webpack -->        
            
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
            ape_paterno: "<?php echo e($alm['ape_paterno']); ?>",    
            ape_materno: "<?php echo e($alm['ape_materno']); ?>",    
            nombre: "<?php echo e($alm['nombre']); ?>",
            cod_rude: "<?php echo e($rude['cod_rude']); ?>",
            // -------------
            pais: "<?php echo e($lug_nac['ln_pais']); ?>",   
            departamento: "<?php echo e($lug_nac['ln_depa']); ?>",   
            provincia: "<?php echo e($lug_nac['ln_prov']); ?>",  
            localidad: "<?php echo e($lug_nac['ln_loc']); ?>",
            
            // -------------
            ofc_num: "<?php echo e($lug_nac['cn_oficialia']); ?>",    
            lib_num: "<?php echo e($lug_nac['cn_numlibro']); ?>",    
            par_num: "<?php echo e($lug_nac['cn_numpartida']); ?>",    
            fol_num: "<?php echo e($lug_nac['cn_numfolio']); ?>",
            rue_num:"<?php echo e($rude['rue_num']); ?>",
            rue_nom:"<?php echo e($rude['rue_nom']); ?>",
            
            // -------------
            tip_doc: "<?php echo e($rude['tip_doc']); ?>",    
            num_doc: "<?php echo e($rude['num_doc']); ?>", 
            fec_nac: "<?php echo e($rude['fec_nac']); ?>",    
            sexo: "<?php echo e($rude['sexo']); ?>",
            
            // -------------
            optCurso: <?php echo e($gestion['gst_grd_escolar']); ?>,
            gst_aula: "<?php echo e($gestion['gst_aula']); ?>",

            // -------------
            dir_prov: "<?php echo e($dir['dir_prv']); ?>",   
            municipio: "<?php echo e($dir['dir_mun']); ?>",  
            loc_comn: "<?php echo e($dir['dir_loc']); ?>",
            zn_villa: "<?php echo e($dir['dir_zon']); ?>",   
            av_calle: "<?php echo e($dir['dir_calle_ave']); ?>",   
            telf: "<?php echo e($dir['dir_telf']); ?>",
            cel: "<?php echo e($dir['dir_cel']); ?>",
            num_viv: "<?php echo e($dir['dir_num_viv']); ?>",
            
            // -------------
            idi_est:"<?php echo e($idioma['idi_habl']); ?>", 
            idihab1_est:"<?php echo e($idioma['idi_habl1']); ?>", 
            idihab2_est:"<?php echo e($idioma['idi_habl2']); ?>", 
            idihab3_est:"<?php echo e($idioma['idi_habl3']); ?>",
            
            // -------------
            pert_est:"<?php echo e($idioma['idi_nacion']); ?>",    
            pert_est_otro:"<?php echo e($idioma['idi_nacion2']); ?>",
            
            // -------------
            exit_salud_est:"<?php echo e($salud['sal_centro']); ?>",  
            vec_salud_est:"<?php echo e($salud['sal_frec']); ?>",   
            disc_est:"",
            dis1:"<?php echo e($salud['sal_disc1']); ?>",    
            dis2:"<?php echo e($salud['sal_disc2']); ?>", 
            dis3:"<?php echo e($salud['sal_disc3']); ?>",   
            discp:"<?php echo e($salud['sal_adq']); ?>",
            discp_otro:"<?php echo e($salud['sal_discOtro']); ?>",
            
            //--------------
            ser_agua:"<?php echo e($serBas['ser_agua']); ?>",    
            elec_est:"<?php echo e($serBas['ser_energia']); ?>",        
            water_est:"<?php echo e($serBas['ser_letrina']); ?>",            
            
            // -------------
            trab_est:"<?php echo e($activ['act_realizada']); ?>",    
            dia_trab_est:"<?php echo e($activ['act_diastrab']); ?>",    
            rec_pag_est:"<?php echo e($activ['recpago']); ?>",
            
            // -------------
            internet_est:"<?php echo e($net['int_lug']); ?>", 
            frec_inter_est:"<?php echo e($net['int_frecuencia']); ?>",
            
            transp_esp:"<?php echo e($transp['trs_como']); ?>", 
            trans_otro_est:"<?php echo e($transp['trs_otro']); ?>", 
            transp_tiempo:"<?php echo e($transp['trs_tiempo']); ?>",
            
            // -------------
            ci_tut:"<?php echo e($tutor['ci_tut']); ?>", 
            ape_tut:"<?php echo e($tutor['ape_tut']); ?>", 
            nom_tut:"<?php echo e($tutor['nom_tut']); ?>", 
            idim_tut:"<?php echo e($tutor['idim_tut']); ?>",
            
            ocp_tut:"<?php echo e($tutor['ocp_tut']); ?>",
            grd_tut:"<?php echo e($tutor['grd_tut']); ?>", 
            paren_tut:"<?php echo e($tutor['paren_tut']); ?>", 
            
            // -------------
            ci_madre:"<?php echo e($tutor['ci_madre']); ?>",
            ape_madre:"<?php echo e($tutor['ape_madre']); ?>", 
            nom_madre:"<?php echo e($tutor['nom_madre']); ?>", 
            idim_madre:"<?php echo e($tutor['idim_madre']); ?>", 
            ocp_madre:"<?php echo e($tutor['ocp_madre']); ?>", 
            grd_madre:"<?php echo e($tutor['grd_madre']); ?>",            
            
            
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