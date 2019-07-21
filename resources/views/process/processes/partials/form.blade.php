

<div class="card text-left">
	<div class="card-body">
		<div class="row">
				<div class="form-group col-md-4">
						{{ Form::label('tarja_proceso', 'Numero de tarja') }}
						{{ Form::text('tarja_proceso','PRO0'.$lastid, ['class' => 'form-control', 'readonly']) }}
					</div>
			
					<div class="form-group col-md-4">
						{{ Form::label('Box_out', 'Cajas a Procesar') }}
						{{ Form::text('Box_out', null, ['class' => 'form-control']) }}
					</div>
			
					<div class="form-group col-md-4">
						{{ Form::label('wash', 'Lavado') }}
						{{ Form::select('wash', array('1' => 'Si', '2' => 'No'), 
							null ,['class' => 'form-control','required' ,'placeholder'=>'¿Esta Lavado?'])}}
					</div>
		</div>

		<div class="col-md-12">
			<h3 class="text-center">Lista de Recepciones</h3>
			<div class="form-group">
				<ul class="list-unstyled">

					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr class="">
									<th></th>
									<th>Tarja</th>
									<th>Fruta</th>
									<th>Temporada</th>
									<th>Calidad</th>
								</tr>
							</thead>
							<tbody>

								@forelse($receptions as $reception)
								<tr>
									<th>{{ Form::checkbox('receptions[]', $reception->id) }} </th>
									<th>{{ $reception->tarja }}</th>
									<th>{{ $reception->fruit->specie }}</th>
									<th>{{ $reception->season->name }}</th>
									<th>{{ $reception->quality->name }}</th>

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

					<h5>¿ El Proceso está? </h5>
					<input type="radio" name="rejected" value="0" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" checked> Bueno

					<input type="radio" name="rejected" value="1" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> Rechazado

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


	</div>
</div>

<br>


<div class="card">
	<div class="card-header bg-warning">
		<div class="row">
			<div class="col-md-4">
				<h4> Sub Procesos </h4>
			</div>
			<div class="col-md-8">
				
					<button type="button" class="btn btn-success btn-circle btn-md float-right" onclick="addChild()">
							<i class="fa fa-plus">
							</i>
					</button>

			</div>
			
		</div>
	</div>
	<div class="card-body" id="childsasdf">

		@php
			$count = 1;
		@endphp

		<div class="badge badge-pill badge-primary float-left"> {{ $count }} </div>

		<div class="col-md-12">
			<div class="row">
				
				<div class="form-group col-md-3">
					<label for="quantity"> Cantidad </label>
					<input class="form-control", onkeyup="rest()", name="row[0][cantidad]" id="cantidad" type="text">
				</div>

				<div class="form-group col-md-3">
					{{ Form::label('format_id', 'Formato') }}
					{{Form::select('row[0][formatos]', $listFormat, null, 
					['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
					
				</div>

				<div class="form-group col-md-3">
					{{ Form::label('quality_id', 'Calidad') }}
					{{Form::select('row[0][cualidades]', $listQualities, null, 
					['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
				</div>

				<div class="form-group col-md-3">
					{{ Form::label('status_id', 'status de la fruta') }}
					{{Form::select('row[0][estatus]', $listStatus, null, 
					['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
				</div>
			</div>
		</div>


	</div>
</div>

<script>
	@php
		$count = 1;
	@endphp
	
	var childNumber = {{ $count }};

	function addChild() {
		var parent = document.getElementById('childsasdf');
		var newChild = '<div class="badge badge-pill badge-primary float-left">' + childNumber + '</div>' +

			` <div class="col-md-12">
					<div class="row">
						
						<div class="form-group col-md-3">
							<label for="quantity"> Cantidad </label>
							<input class="form-control" name="row[`+ childNumber +`][cantidad]" type="text">
						</div>
		
						<div class="form-group col-md-3">
							{{ Form::label('format_id', 'Formato') }}
							{{Form::select('row[`+ childNumber +`][formatos]', $listFormat, null, 
							['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
							
						</div>
		
						<div class="form-group col-md-3">
							{{ Form::label('quality_id', 'Calidad') }}
							{{Form::select('row[`+ childNumber +`][cualidades]', $listQualities, null, 
							['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
						</div>
		
						<div class="form-group col-md-3">
							{{ Form::label('status_id', 'status de la fruta') }}
							{{Form::select('row[`+ childNumber +`][estatus]', $listStatus, null, 
							['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
						</div>


					</div>
				</div>
			`;

		parent.insertAdjacentHTML('beforeend', newChild);
		childNumber++;
		
	}


	
</script>


<br>
@if($uno == false)
<div class="col-md-12 text-center">
	<div class="form-group text">
		{{ Form::submit('Guardar', ['class' => 'btn btn-lg  btn-primary']) }}
	</div>
</div>
@else

<div class="btn btn-lg btn-danger disabled"> No se puede ingresar </div>

@endif
<br>
<br>


