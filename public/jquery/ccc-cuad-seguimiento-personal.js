moment.locale('es');         
const app1 = new Vue({
    el: "#Cuad_Seguimiento",
    created: function () {
        this.getAct();
    },                
    data: {
        listado: [],
        paginacion :{
            'total'    : 0,
            'act_pag'  : 0,
            'por_pag'  : 0,
            'ult_pag'  : 0,
            'de'       : 0,
            'al'       : 0,
            },
        tar_desc: '',
        fini: '',
        editor: '',                    
        errors: [],
        offset: 3,
        text: '',
        contar: 0,
    },
    mounted: function () { //cuando se cargo la pagina

    },
    computed:{
        isActived:function(){
            return this.paginacion.act_pag;
        },
        pagesNumber: function(){
            var pagesArray = [];
            if(!this.paginacion.al){
                return [];
            }
            // Desde
            var from = this.paginacion.act_pag - this.offset;
            if(from<1){
                from = 1;
            }
            // Hasta
            var to = from + (2 * this.offset);
            if(to >= this.paginacion.ult_pag){
                to = this.paginacion.ult_pag;
            }
            while(from <= to){
                pagesArray.push(from) ;
                from++;                           
            }
            return pagesArray;
        },
    },
    methods: {                    
        getAct: function (pag) {
            var urlAct = "cuaderno/"+personal+"/mostrar?page="+pag;
            axios.get(urlAct).then(response => {
                this.listado = response.data.lisCuaderno.data;
                this.paginacion = response.data.paginacion;
            });                        
        },                    
        crearSeguimiento: function () {
            var urlGuaAct = "cuaderno/guardar";
            this.tar_desc = CKEDITOR.instances.editor.getData();
            axios.post(urlGuaAct, {
                Seguimiento: this.tar_desc
            }).then(response => {
                this.getAct();
                this.tar_desc = '';
                this.errors = '';
                toastr.success('Seguimiento Guardado!!!');
            }).catch(error => {
                this.errors = error.response.data
            });

        },
        eliminarSeguimiento: function (tarea) {
            var urlAct = "cuaderno/borrar/" + tarea.pc_id;
            axios.delete(urlAct).then(response => {
                this.getAct();
                toastr.success('Seguimiento Eliminado!!!' + response.data);
            })
        },
        modFec: function(fecha){
            // moment(String(tarea.pc_fec)).format('DD/MM')
            var fecMod = ''; 
            fecMod = moment(String(fecha)).format('D MMM');
            return fecMod;
        },
        cambiarPag:function(pag){
            this.paginacion.act_pag = pag;
            this.getAct(pag);

        }, 
        validateBeforeSubmit: function(){                    
            if(CKEDITOR.instances.editor.getData()!=""){
                $("#crear").modal('hide');
                this.crearSeguimiento();
                CKEDITOR.instances.editor.setData('');                            
            }
            else{
                toastr.error('Necesita ingresar datos!!!');
            }                        
        },                  
    }
});

$(document).ready(function () {
    initSample();                
});