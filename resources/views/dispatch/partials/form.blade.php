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


<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('patentNo', 'Numero de patente') }}
			{{ Form::text('patentNo', null, ['class' => 'form-control ']) }}
		</div>
	</div>
	
    
	
	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('exporter_id', 'Selecciona un exportador') }}
		{{Form::select('exporter_id', $listexporter, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
	</div>
	</div>
</div>	



<div class="col-md-12">
			<h3 class="text-center">Listado de productos en camara</h3>
			<div class="form-group">
				<ul class="list-unstyled">

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr class="">
									<th></th>
									<th>Tarja id</th>
									<th>Fruta</th>
									<th>Peso Bruto</th>
									<th>Rejillas</th>
									
									<th>Calidad</th>
								</tr>
							</thead>
							<tbody>

								@forelse($subprocesses as $subprocess)
								<tr>
									<th>{{ Form::checkbox('subprocesses[]', $subprocess->id) }} </th>
									<th>{{ $subprocess->tarja }}</th>
									


									@php
									$uno = false;
									@endphp

								</tr>

								@empty

								<h4> Sin Registros </h4>
 
								@php
								$uno = true;
								@endphp

								@endforelse

							</tbody>
						</table>
					</div>

				</ul>
			</div>
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



