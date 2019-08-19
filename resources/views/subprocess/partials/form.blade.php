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
				<h2>{{ $peso }} Kg</h2>
			</td>
			<td>
				<h2> {{ $acumWeight }} Kg</h2>
			</td>
			<td>
				<h2 id="resto">{{ $resto = $peso-$acumWeight }} Kg</h2>
			</td>
		</tr>
	</tbody>
</table>
@php(
$range = round((($acumWeight*100)/$peso))
)

<div class="progress progress-small" style="height: 30px;">
	<div style="width: {{$range}}% ; backbroud-color: #green; !important;" class="progress-bar bg-success"> {{$range}}%
	</div>
</div>
<br>
<br>

<div class="card">
	<div class="card-body" $>
		<div class="d-flex justify-content-center">
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
						{{ Form::label('', 'N° Proceso') }}
						{{ Form::text('', 'Proceso '.$idsad, ['class' => 'form-control','readonly']) }}
					</div>

					<input name="process_id" type="hidden" value={{$idsad}}>
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
						<input name="weight" class="form-control" id="weight" onkeyup="this.onchange();"
							onpaste="this.onchange();" oninput="this.onchange();" onchange="validacion()" type="number"
							readonly>
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

			
			<div class="col-md-12 text-center">
				<div class="form-group text">
					{{ Form::submit('Guardar', ['class' => 'btn btn-success','id' =>'save']) }}
				</div>
			</div>
	


	
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Selecciona</th>
					<th>Nª de tarja</th>
					<th>Cantidad</th>
					<th>Formato</th>
					<th>Calidad</th>
					<th>Estatus</th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				@foreach($subprocesses as $subprocess)
				<tr>
					<th>{{ Form::checkbox('subprocesses[]', $subprocess->id, null, ['value'=>'$subprocess->id', 'onclick'=>'loteCreate(this)']) }}
					</th>
					<td> SP0{{$subprocess->id}} </td>
					<td> {{$subprocess->format->name}} </td>
					<td> {{$subprocess->quality->name}} </td>
					<td> {{$subprocess->quantity}} </td>
					<td> {{$subprocess->quantity}} </td>

				</tr>
				@endforeach
				{{ $subprocesses->render() }}
			</tbody>
		</table>
	</div>
</div>

<br>


<script>
	function getWeightFormat(){
			var quantityBox = document.getElementById('cantidad').value;
			var formatWeight = document.getElementById('formatWeight').value;
			var kgProcesado = Number(quantityBox)*Number(formatWeight);
			document.getElementById('weight').value = kgProcesado;
			validacion(kgProcesado)
	}
	function validacion(kgProcesado){
		var input = kgProcesado;
		var acumWeight = {{ $acumWeight }};
		var sum = acumWeight + input;

		if(sum > {{ $peso }} ){
			swal("Peso Superado!", "Por favor, ingrese la información correcta", "error");
			document.getElementById('save').setAttribute("disabled","disabled");
			var quantityBox = document.getElementById('cantidad').value = '';
			document.getElementById('weight').value = '';
		}else{
			document.getElementById('save').removeAttribute("disabled");

		}
	}
	
	function resto(){
		
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