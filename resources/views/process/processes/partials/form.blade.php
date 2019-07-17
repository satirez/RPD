<div class="form-group">
	{{ Form::label('tarja_proceso', 'Numero de tarja') }}
	{{ Form::text('tarja_proceso','PRO0'.$lastid, ['class' => 'form-control', 'readonly']) }}
</div>

<div class="form-group">
	{{ Form::label('Box_out', 'cajas que salieron') }}
	{{ Form::number('Box_out', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::label('wash', 'Lavado') }}
	{{ Form::select('wash', array('1' => 'Si', '2' => 'No'), 
	null ,['class' => 'form-control','required' ,'placeholder'=>'Seleccione si el proceso es lavado o no'])}}
</div>

<div class="col-md-10">
		<h3>Lista de Recepcion</h3>
				<div class="form-group">
					<ul class="list-unstyled">

							<div class="table-responsive">
									<table class="table table-hover">
										<thead>
											<tr class="">
											   <th>Tarja de Proceso</th>
											   <th>N° cajas realizadas</th>
											   <th>Creado</th>
											 
											   @forelse($receptions as $reception)

											   <th colspan="auto">&nbsp;</th>
										   </tr>
									   </thead>
										  <tbody>
												<li>
													<label>
														{{ Form::checkbox('receptions[]', $reception->id) }}
														{{ $reception->tarja }}
														
													</label>
													@php
														$uno = false;
													@endphp
													
												</li>
						
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

<div class="card text">
	<div class="card-header">
			<h4> Sub Procesos </h4>
			<button type="button" class="btn btn-info btn-circle btn-md float-right" 
				onclick="addChild()">
				<i class="fa fa-plus">
				</i>
			</button>
	</div>
	<div class="card-body" id="i-want-more-children">

			@php
				$count = 1;	
			@endphp

			<div class="btn btn-info btn-circle btn-sm float-left"> {{ $count }} </div>

		<div class="col-md-12">
				<div class="row">
					<div class="form-group col-md-3">
						<label for="format_id"> Formato </label>
						<input class="form-control" name="format_id" type="text">
					</div>
					
					<div class="form-group col-md-3">
						<label for="quantity"> Cantidad </label>
						<input class="form-control" name="quantity" type="number">
					</div>
				
					<div class="form-group col-md-3">
						<label for="quality_id"> Calidad </label>
						<input class="form-control" name="quality_id" type="text">
					</div>

					<div class="form-group col-md-3">
							<label for="status_id"> Estatus </label>
							<input class="form-control" name="status_id" type="text">
					</div>
				</div>
		</div>


	</div>
</div>

<script>

		@php
			$count++;
		@endphp
		var childNumber = {{ $count }};

		function addChild() {
		  var parent = document.getElementById('i-want-more-children');
		  var newChild = '<div class="btn btn-info btn-circle btn-sm float-left">' + childNumber +'</div>'+
		  
			` <div class="col-md-12">
					<div class="row">
						<div class="form-group col-md-3">
							<label for="format_id"> Formato </label>
							<input class="form-control" name="format_id" type="text">
						</div>
						
						<div class="form-group col-md-3">
							<label for="quantity"> Cantidad </label>
							<input class="form-control" name="quantity" type="number">
						</div>
					
						<div class="form-group col-md-3">
							<label for="quality_id"> Calidad </label>
							<input class="form-control" name="quality_id" type="text">
						</div>

						<div class="form-group col-md-3">
								<label for="status_id"> Estatus </label>
								<input class="form-control" name="status_id" type="text">
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
		<div class="col-md-4">
			<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm  btn-primary']) }}
			</div>
		</div>
	@else
	
		<div class="btn btn-lg btn-danger disabled"> No se puede ingresar  </div>

	@endif
<br>
<br>



	





