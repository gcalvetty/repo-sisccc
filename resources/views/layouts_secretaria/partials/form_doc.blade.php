    {!! Form::hidden('idUsu', $idUsu)!!}
	<div class="form-group">
		<div class="input-group input-file" name="ArcPdf">
			<span class="input-group-btn">
        		<button class="btn btn-info btn-choose" type="button"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
    		</span>
    		<input type="text" class="form-control" placeholder='Selecciona la Libreta...' />
    		<span class="input-group-btn">
       			 <button class="btn btn-warning btn-reset" type="button">Borrar</button>
    		</span>
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary pull-right guardar" disabled>Guardar</button>		
    </div>
