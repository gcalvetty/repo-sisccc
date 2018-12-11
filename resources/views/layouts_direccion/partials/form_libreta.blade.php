{!! Form::hidden('idAlum', $IdAlum)!!}
<div class="form-group">
    {{ Form::file('ArcPdf') }}
    {{ Form::submit('Subir')}}
</div>