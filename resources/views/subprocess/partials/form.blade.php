<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous">
</script>

<table class="table justify-content-center text-center">
	<thead>
		<tr>
			<th scope="col">PESO TOTAL</th>
			<th scope="col">PESO UTILIZADO</th>
			<th scope="col">PESO RESTANTE</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>
				<h2>{{ $peso }}</h2>
			</td>
			<td>
				<h2> 00 </h2>
			</td>
			<td>
				<h2> 00 </h2>
			</td>
		</tr>
	</tbody>
</table>

<div class="card">
	<div class="card-body">
		<div class="d-flex justify-content-center">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('process_id', 'Proceso') }}
						{{ Form::text('process_id', 'PR'.$idsad, ['class' => 'form-control','readonly']) }}
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('quantity', 'Cantidad de Cajas') }}
						{{ Form::text('quantity', null, ['class' => 'form-control','id'=>'cantidad','oninput'=>'getWeightFormat()']) }}
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('format_id', 'Formato') }}
						{{ Form::select('format_id',$listFormat, null, ['class' => 'form-control input-number','id'=>'formatWeight','oninput'=>'getWeightFormat()']) }}
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						{{ Form::label('quality_id', 'Calidad') }}
						{{Form::select('quality_id', $listQualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label> Kg Procesados </label>
						<input class="form-control" 
						id="kgTotal" 
						onkeyup="this.onchange();" 
						onpaste="this.onchange();" 
						oninput="this.onchange();"  
						onchange="validacion()" 
						type="text">
					</div>
				</div>
			</div>
		</div>
<div class="col-md-12">
			<div class="form-group">
				<div class="bs-example">

					<h5>¿ El Proceso está? </h5>
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

<div class="col-md-12 text-center">
	<div class="form-group text">
		{{ Form::submit('Guardar', ['class' => 'btn btn-success','id' =>'save']) }}
	</div>
</div>

<script>
	function getWeightFormat(){
			var quantityBox = document.getElementById('cantidad').value;
			var formatWeight = document.getElementById('formatWeight').value;
			var kgProcesado = Number(quantityBox)*Number(formatWeight);
			document.getElementById('kgTotal').value = kgProcesado;
			validacion(kgProcesado)
	}
	function validacion(kgProcesado){
		var input = kgProcesado;
		if(input > {{ $peso }} ){
			alert('peso superado');
			
		}
	}
	
	function hola(){
		
	}
</script>


<!-- Permitir solo numeros, puntos y X-->
<script type="text/javascript">
	$(document).ready(function (){
  $('.input-number').keyup(function (){
	this.value = (this.value + '').replace(/[^.x0-9]/g, '');
  });
});
</script>