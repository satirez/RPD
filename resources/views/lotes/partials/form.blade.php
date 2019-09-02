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

					<div class="h3 alert-danger ">
						<p class="text-uppercase"> Debe ingresar el numero de cajas primero </p>
					</div>

					<div class="my-5">
						<label for="lote"> Numero de Cajas</label>
						<input name="lote" id="contable" type="text" class="form-control">
					</div>

					<ul class="list-unstyled">
						<div class="table-responsive">
							<table class="table table-hover" id="subprocess">
<<<<<<< HEAD
							Tope de pallet	<input type="number" id="topePallet"> <br> <br>
=======
								<thead>
									<tr>
									<th>Seleccione</th>	
									<th>Calidad</th>
									<th>Cantidad</th>
									<th>Formato</th>
									<th>Peso</th>
									<th>Tarja Subproceso</th>
									</tr>

								</thead>

>>>>>>> 2fa96b1e65e311ce6f06a2563f36099501cf3a05
								<tbody>

									@forelse($subprocesses as $subprocess)
									<tr>
										<td>
											<input type="checkbox" name="subprocess[]" value="{{ $subprocess->id }}">
										</td>
										<td>{{ $subprocess->quality->name }}</td>
										<td class="quantity">{{ $subprocess->quantity }}</td>
										<td>{{ $subprocess->format->name}}</td>
										<td>{{ $subprocess->weight }}</td>
										<td>SP0{{ $subprocess->id }}</td>

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
						<div class="row">
							<div class="col-md-4">
								<h3>TOTAL DE CAJAS</h3>
							</div>
							<div class="col-md-4">
								<strong>
									<div id="result"></div>
								</strong>
							</div>
						</div>
					</ul>
				</div>
			</div>
		</div>
	</div>



</div>

<div class="row">

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
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
					{{ Form::submit('Guardar', ['class' => 'btn btn-primary','target'=>'_blank']) }}
					<button type="button" id="save" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>



<script>
	function getTope(){
	 let n = document.getElementById('topePallet').value;
	 return n;
	}

	$('#subprocess input[type="checkbox"]').on('change', function() {
	 var table = $(this).closest('#subprocess'),
	 //acá la idea es que se haga un array de todos los checkeados para eso se instancia table.find 
	  checked = table.find('input[type=checkbox]:checked'),
	 // acá dentro del table tenemos tr y dentro td pero par que la suma sea solo de una columna se agrega la clase quantity asi solo busca esa clase
	  prices = checked.closest('tr').find('td.quantity'),
	 // luego se hace un map  que busca si es numero, letra todo etc 
	  sum = prices.map(function() {
		return parseFloat(this.textContent.trim(), 10) || 0;
	  }).get().reduce(function(a, b) {
		return a + b;
	  });
	  var url = $("#contable").val();

	  if(sum > url){
		swal("Has exedido el limite de cajas permitida.", "Vuelva a ingresar la información", "warning");
		
		for(var i = 0; i < checked.length; i++){

			checked[i].checked = false;
		}
		 $("#contable").val('');

		$('#result').text('');
		$('#save').setAttribute('disabled','disabled');
		
	  }else{

		$('#result').text(sum);

	  }
	  // se imprime todo en result 


		
  }).change();

</script>