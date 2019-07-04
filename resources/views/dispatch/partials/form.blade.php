<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

<script>
    //No permitir comas
    function coma(e) { 
    tecla=(document.all) ? e.keyCode : e.which; 
    if (tecla==44) { 
        alert('No usar "Comas", reemplazar por "punto" ');
        return false; 
    	} 

	} 

</script>

	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('patentNo', 'Numero de patente') }}
			{{ Form::text('patentNo', null, ['class' => 'form-control ']) }}
		</div>
	</div>
	
    <div class="row">
	
	<div class="col-md-3">
		<div class="form-group">
		{{ Form::label('exporter_id', 'Selecciona un exportador') }}
		{{Form::select('exporter_id', $listexporter, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
	</div>
	</div>
	
</div>

    <h3>Procesos para despacho</h3>
<div class="form-group">
	<ul class="list-unstyled">
		@foreach($processes as $process)
		<li>
			<label>
				{{ Form::checkbox('process[]', $process->id) }}
				{{ $process->tarja_proceso }}
			</label>
		</li>
		@endforeach 
	</ul>
</div>

	<div class="col-md-4">
		<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
		</div>
	</div>




