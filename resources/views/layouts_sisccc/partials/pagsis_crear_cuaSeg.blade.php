<div class="modal fade" tabindex="-1" role="dialog" id="crear">
<form action="#" v-on:submit.prevent="validateBeforeSubmit" method="post">
    <div class="modal-dialog" role="document">
        <div class="modal-content"  id="tarea">        
            <div class="modal-header">
                <div class="box-header ui-sortable-handle" style="cursor: move;">
                        <i class="fa  fa-pencil-square-o"></i>
                        <h3 class="box-title">Seguimiento</h3>                        
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12 hidden">
                    <input type="text" class="form-control" 
                            name="tar_desc"     
                            v-model ="tar_desc"
                            placeholder="Seguimiento">
                </div>                 
                <textarea id="editor" rows="5" cols="80" placeholder="Ingrese aqui la información!!!"></textarea>   
                <span v-for="error in errors" class="text-danger">
                        @{{ error }}
                </span>           
            </div>
            <div class="modal-footer">                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</form>    
</div>        