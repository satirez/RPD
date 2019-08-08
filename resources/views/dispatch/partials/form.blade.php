{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}

<div class="card">
	<div class="card-header">
		<div class="badge badge-pill badge-primary float-left"> 1 </div>
		Selección e ingreso de exportacion:
	</div>
	<div class="card-body">
		<div class="row">

			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('exporter_id', 'Selecciona un exportador') }}
					{{Form::select('exporter_id', $listexporter, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
				</div>
			</div>

			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('planilla_dispatch', 'Numero de Planilla de despacho') }}
					{{ Form::text('planilla_dispatch', null, ['class' => 'form-control ']) }}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('numero_guia', 'Numero de Guia') }}
					{{ Form::text('numero_guia', null, ['class' => 'form-control ']) }}
				</div>
			</div>

		</div>


		<div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('season_id', 'Temporada') }}
						{{Form::select('season_id', $listSeasons, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('tipoproductodispatch_id', 'Selecciona un producto a despachar:') }}
						{{Form::select('tipoproductodispatch_id', $listTipoProductoDispatch, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						{{ Form::label('numero_despacho', 'Numero de Despacho') }}
						{{ Form::text('numero_despacho', null, ['class' => 'form-control ']) }}
					</div>
				</div>

			</div>

		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-header">
		<div class="badge badge-pill badge-success float-left"> 2 </div>
		Selección de medios de exportacion:
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('tipodispatch_id', 'Selecciona un tipo de despacho') }}
					{{Form::select('tipodispatch_id', $listtipodispatch, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('tipotransporte_id', 'Selecciona un Tipo de Transporte:') }}
						{{Form::select('tipotransporte_id', $listTipoTransporte, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('nombre_chofer', 'Nombre del Chofer') }}
					{{ Form::text('nombre_chofer', null, ['class' => 'form-control ']) }}
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('patente_vehiculo', 'Patente del Vehiculo') }}
					{{ Form::text('patente_vehiculo', null, ['class' => 'form-control ']) }}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('patente_rampla', 'Patente de la Rampla') }}
					{{ Form::text('patente_rampla', null, ['class' => 'form-control ']) }}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('numero_contenedor', 'Numero del Contenedor') }}
					{{ Form::text('numero_contenedor', null, ['class' => 'form-control ']) }}
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('consignatario', 'Nombre Del Consignatario') }}
					{{ Form::text('consignatario', null, ['class' => 'form-control ']) }}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('puerto_salida', 'Puerto De Salida') }}
					{{ Form::text('puerto_salida', null, ['class' => 'form-control ']) }}
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					{{ Form::label('puerto_destino', 'Puerto de Destino') }}
					{{ Form::text('puerto_destino', null, ['class' => 'form-control ']) }}
				</div>
			</div>
		</div>
	</div>
</div>

<br>

<div class="card">
	<div class="card-header">
		<div class="badge badge-pill badge-warning float-left"> 3 </div>
		Selección de procesos:
	</div>

	<div class="card-body">
		<div class="row">
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
										<th>Cantidad</th>
										<th>Formato</th>
										<th>Kilos</th>

										<th>Calidad</th>
									</tr>
								</thead>
								<tbody>

									@forelse($subprocesses as $subprocess)
									<tr>
										<th>{{ Form::checkbox('subprocesses[]', $subprocess->id) }} </th>
										<th>{{ $subprocess->id }}</th>
										<th>{{ $subprocess->quantity }}</th>
										<th>{{ $subprocess->format->name}}</th>
										<th>{{ $subprocess->weight }}</th>
										<th>{{ $subprocess->quality->name }}</th>

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
		</div>
	</div>
</div>

<br>

<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			{{ Form::label('comment', 'Comentario (Maximo 200 caracteres)') }}
			{{ Form::textarea('comment', null, ['class' => 'form-control ',
			'maxlength' => '200','rows'=>'5'
			]) }}
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<div class="bs-example">

			<input type="radio" name="rejected" value="0" data-toggle="collapse" data-parent="#accordion"
				href="#collapseOne" checked> Bueno

			<input type="radio" name="rejected" value="1" data-toggle="collapse" data-parent="#accordion"
				href="#collapseOne"> Rechazado

			<div class="panel-group" id="accordion">
				<div class="panel panel-default">
					<div id="collapseOne" class="panel-collapse collapse in">
						<div class="panel-body">
							<div class="card">
								<div class="card-body">
									{{Form::label('reason', 'Selecciona motivo de rechazo') }}
									{{Form::select('reason', $listRejecteds, null, ['class' => 'form-control', 'placeholder'=>'Seleccione una opción'])}}
									{{Form::label('commentrejected', 'Comentario Adicional') }}
									{{Form::textarea('commentrejected',null,['class'=>'form-control'])}}

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>

</div>

<div class="col-md-12 text-center">
	<div class="form-group">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
			Guardar
		</button>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Guardar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Está seguro de guardar los cambios efectuados?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
