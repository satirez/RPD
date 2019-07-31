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
				<div class="col-md-5">
					<div class="form-group">
						{{ Form::label('tarja_subprocceses', 'Proceso') }}
						{{ Form::text('tarja_subprocceses', 'PRO'.$idsad, ['class' => 'form-control','readonly']) }}
					</div>
				</div>
				<div class="col-md-5">
					<div class="form-group">
						{{ Form::label('quantity', 'Cantidad ') }}
						{{ Form::text('quantity', null, ['class' => 'form-control','id'=>'cantidad','oninput'=>'getWeightFormat()']) }}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-5">
					<div class="form-group">
						{{ Form::label('format', 'Formato') }}
						{{ Form::select('format',$listFormat, null, ['class' => 'form-control input-number','id'=>'formatWeight','oninput'=>'getWeightFormat()']) }}
					</div>
				</div>
				<div class="col-md-5">
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