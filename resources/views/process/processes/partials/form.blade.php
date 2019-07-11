<div class="form-group">
	{{ Form::label('tarja_proceso', 'Numero de tarja') }}
	{{ Form::text('tarja_proceso','PRO0'.$lastid, null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::label('Box_out', 'cajas que salieron') }}
	{{ Form::number('Box_out', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::label('wash', 'Lavado') }}
	{{ Form::select('wash', array('1' => 'Si', '2' => 'No'), 
	null ,['class' => 'form-control','class' => 'col-md-7','required' ,'placeholder'=>'Seleccione si el proceso es lavado o no'])}}
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
											 
											  
											   <th colspan="auto">&nbsp;</th>
										   </tr>
									   </thead>
										  <tbody>
												@forelse($receptions as $reception)
												<li>
													<label>
														{{ Form::checkbox('receptions[]', $reception->id) }}
														{{ $reception->tarja }}
														
													</label>
					
													
												</li>
						
												@empty
						
												<p>Sin registros</p>
						
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
	<div class="col-md-4">
		<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm  btn-primary']) }}
		</div>
	</div>
	<br>
	<br>



	





