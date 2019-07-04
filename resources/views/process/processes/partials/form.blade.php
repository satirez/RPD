<div class="form-group">
	{{ Form::label('tarja_proceso', 'Numero de tarja') }}
	{{ Form::text('tarja_proceso', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::label('Box_out', 'cajas que salieron') }}
	{{ Form::text('Box_out', null, ['class' => 'form-control ']) }}
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



						

						
					</ul>
				</div>
</div>


<div class="col-md-10">
		<div class="form-group">
	
<p>
  <button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#CollapseRejected" aria-expanded="false" aria-controls="CollapseRejected">Producto Rechazado</button>
</p>
			<div class="col-md-4">
			    <div class="collapse multi-collapse" id="CollapseRejected">
			      <div class="card card-body">
				 	{{ Form::label('rejected_id', 'Selecciona motivo de rechazo') }}
					{{Form::select('rejected_id', $listRejecteds, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
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



	





