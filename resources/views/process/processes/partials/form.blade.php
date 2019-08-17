<div class="card text-left">
	<div class="card-body">
		<div class="row">
			<div class="form-group col-md-4">
				{{ Form::label('tarja_proceso', 'Numero de tarja') }}
				{{ Form::text('tarja_proceso','Pallet_'.$lastid, ['class' => 'form-control', 'readonly']) }}
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
						<table id="tableReception" class="table table-hover">
							<thead>
								<tr class="">
									<th></th>
									<th>Tarja</th>
									<th>Fruta</th>
									<th>Peso Bruto</th>
									<th>Rejillas</th>
									<th>Calidad</th>
								</tr>
							</thead>
							<tbody>
								<script>
									var receptionArray = [];	
								</script>
								@forelse($receptions as $reception)
								<tr>
									<th>{{ Form::radio('receptions[]', $reception->id, null, ['value'=>'$reception->id', 'onclick'=>'getWeight(this)']) }}
									</th>
									<th>{{ $reception->tarja }}</th>
									<th>{{ $reception->fruit->specie }} - {{ $reception->varieties->variety }}</th>
									<th>{{ $reception->grossweight }}</th>
									<th>{{ $reception->quantity }}</th>
									<th>{{ $reception->quality->name }}</th>
									<script>
										receptionArray.push({{$reception->grossweight}},{{$reception->id}});
									</script>
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

<br>
	@if($uno == false)
		<div class="col-md-12 text-center">
			<div class="form-group text">
				{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
			</div>
		</div>
	@else
		<div class="btn btn-lg btn-danger disabled"> No se puede ingresar </div>
	@endif
<br>
<br>


