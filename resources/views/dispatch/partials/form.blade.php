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
		@forelse($processes as $process)
		<li>
			<label>
				{{ Form::checkbox('process[]', $process->id) }}
				{{ $process->tarja_proceso }}
			</label>
		</li>

		@php
			$uno = false;
		@endphp

		@empty

		@php
			$uno = true;
		@endphp

		<h4> No existen Registros </h4>

		@endforelse 
	</ul>
</div>

<div class="col-md-12">
	<div class="form-group">
		<div class="bs-example">
			
			<input type="radio" 
				name="rejected" 
				value="0" 
				data-toggle="collapse" 
				data-parent="#accordion"
				href="#collapseOne" 
				checked> Bueno

			<input type="radio" 
				name="rejected" 
				value="1" data-toggle="collapse" 
				data-parent="#accordion" 
				href="#collapseOne"> Rechazado
			
			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="card">
								<div class="card-body">
										{{Form::label('reason', 'Selecciona motivo de rechazo') }}
										{{Form::select('reason', $listRejecteds, null, ['class' => 'form-control', 'placeholder'=>'Seleccione una opción'])}}
										{{Form::label('comment', 'Comentario Adicional') }}
										{{Form::textarea('comment', null, ['class' => 'form-control'])}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	  </div>
	 
</div>


	@if($uno == false)
	<div class="col-md-4">
		<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
		</div>
	</div>
	@else

	<h4>
		No se puede guardar
	</h4>
	@endif



