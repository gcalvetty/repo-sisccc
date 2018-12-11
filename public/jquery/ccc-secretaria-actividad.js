import esGECN from '/jquery/vue-datepicker/es.js';
           
const config = {
    errorBagName: 'errors',
    delay: 1000,
    messages: null,
    strict: true
};
Vue.use(VeeValidate, config);
const app = new Vue({
    el: '#Secr_actividad',
    components: {
                    vuejsDatepicker,                    
                },
    validator: null,
    created: function () {
        this.getAct();
    },
    data() {
        return {
            com_tit: "",            
            listado: "",
            fec: 0, 
            fec2: 0,
            fectxtAux: '',
            date2:"",                                                           
            es: esGECN,
            state: {
                date: '',                          
                disabledDates:{ days:[0] },                
            },
        }
    },
    methods: {
        getAct: function () {
            var urlAct = "cal_actividad/mostrar";            
            axios.get(urlAct).then(response => {
                this.listado = response.data;                
            });
        },
        customFormatter(date) {
                        return moment(date).format('DD/MM/YYYY');
                    },
        crearActividad: function () {
            var urlGuaCom = "acc_calactividad";
            var fecGECN = moment(String(this.fec)).format('D/MM/YYYY');
            var fecfinGECN = moment(String(this.fec2)).format('D/MM/YYYY');
            axios.post(urlGuaCom, {
                act_tit: this.com_tit,                
                act_fec: fecGECN,
                act_fecfin: fecfinGECN,
            }).then(response => {
                this.getAct();
                this.com_tit = '';                
                this.fec = '';          
                this.fec2 = '';                
                document.getElementById('fec').value = '';
                document.getElementById('fec2').value = '';
                toastr.info('Actividad Guardada!!!'+ this.fec2);
            }).catch(error => {
                this.errors = error.response.data
            });            
        }, 
        fectxt:function(f1,f2){
            if(f1 !== f2){ this.fectxtAux = f1+ " ->> "+f2; } else { this.fectxtAux = f1; }
            return this.fectxtAux;
        },        
        eliminarComunicado: function (com) {
            var urlAct = "acc_calactividad/" + com.act_id;
            axios.delete(urlAct).then(response => {
                this.getAct();
                toastr.warning('Actividad Eliminada!!!' + response.data);
            });            
        },
        // --------------
        validateBeforeSubmit(e) {
           /* 
           var valFec = this.$validator.validateAll()
           toastr.warning("->"+valFec);
           return;
           */
            this.$validator.validateAll();
            if (this.errors.any()) {
                e.preventDefault();
            } else {
                this.crearActividad();
            }

        }
    }
});