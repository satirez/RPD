<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

  <script type="text/javascript">

    //No permitir comas
    function coma(e) { 
    tecla=(document.all) ? e.keyCode : e.which; 
    if (tecla==44) { 
        alert('No usar "Comas", reemplazar por "punto" ');
        return false; 
    	} 

	} 

    function rest() {
        var txtFirstNo = document.getElementById('grossweight').value;
        var txtSecondNo = document.getElementById('supplies_id').value;
        var txtThirdNo = document.getElementById('quantity').value;
        var palet_weight = document.getElementById('palet_weight').value;

        //Calcular peso neto
        var result = (Number(txtFirstNo)-(Number(txtThirdNo) * Number(txtSecondNo)))-Number(palet_weight);
		//Calcular peso medio por bandeja
		var result2 = (Number(txtFirstNo)/(Number(txtThirdNo)));

       	if(result > 0){
 			if (!isNaN(result)) {
           		document.getElementById('netweight').value = result;
				document.getElementById('middleweight_trays').value = result2.toFixed(2);
            }
       	}else{
            document.getElementById('netweight').value = 0;
			document.getElementById('middleweight_trays').value = 0;
        }
    }
	
</script>


<div class="row">

	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('tarja', 'Numero de Tarja') }}
			{{ Form::text('tarja', 'RE00'.$lastid, ['class' => 'form-control','readonly']) }}
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('quality_id', 'Calidad') }}
		{{Form::select('quality_id', $listQualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
		</div>
	</div>

</div>

<div class="row">
	
		<div class="col-md-4">
			<div class="form-group">
			{{ Form::label('provider_id', 'Productor') }}
			{{Form::select('provider_id', $listProviders, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
			{{ Form::label('status_id', 'Estatus de la fruta') }}
			{{Form::select('status_id', $listStatus, null, ['class' => 'form-control dynamic','required', 'placeholder'=>'Seleccione una opción'])}}
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
			{{ Form::label('season_id', 'Temporada') }}
			{{Form::select('season_id', $listSeasons, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
			</div>
		</div>

</div>

<div class="row">
		
		<div class="col-md-4">
			<div class="form-group">
				<select class="form-control" name="fruit_id" id="fruit_id">
					<option value=""> Fruta </option>
					@foreach ($listFruits as $listFruit)
						<option value="{{ $listFruit->id }}"> {{ $listFruit->specie }}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
				<select class="form-control" name="variety_id" id="variety_id">
					<option value=""> Variedad de Fruta </option>
				</select>
			</div>
		</div>	
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('supplies_id', 'Bandejas') }}
		{{Form::select('supplies_id', $listSupplies, null, ['class' => 'form-control','required',
		'onclick'=>'rest()',
		'id'=>'supplies_id',
		 'placeholder'=>'Seleccione una opción'])}}
		</div> 
	</div>

	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('grossweight', 'Peso bruto') }}
			{{ Form::number('grossweight', null, ['class' => 'form-control ',
			'onkeyup'=>'rest()',
			'onKeyPress'=>'coma(event)',
			'id'=>'grossweight'
			]) }}
		</div>
	</div>

	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('quantity', 'Cantidad de bandejas') }}
			{{ Form::number('quantity', null, ['class' => 'form-control ',
			'onkeyup'=>'rest()',
			'onKeyPress'=>'coma(event)',
			'id'=>'quantity'
			]) }}
		</div>
	</div>
	
</div>

<div class="row">
	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('palet_weight', 'Peso del palet') }}
			{{ Form::number('palet_weight', null, ['class' => 'form-control ',
			'onkeyup'=>'rest()',
			'onKeyPress'=>'coma(event)',
			'id'=>'palet_weight'
			]) }}
		</div>
	</div>

	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('netweight', 'Peso neto') }}
			{{ Form::text('netweight', null, ['class' => 'form-control ', 
			'id'=>'netweight',
			'readonly'
			]) }}
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('middleweight_trays', 'Kg de fruta por bandeja') }}
			{{ Form::number('middleweight_trays', null, ['class' => 'form-control ',
			'id'=>'middleweight_trays',
			'readonly']) }}
		</div>
	</div>
</div>		

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('number_guide', 'Numero de guía') }}
			{{ Form::text('number_guide', null, ['class' => 'form-control ']) }}
		</div>
	</div>

	
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('name_driver', 'Nombre del conductor') }}
			{{ Form::text('name_driver', null, ['class' => 'form-control ']) }}
		</div>
	</div>

	
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('temperature', 'Temperatura de la fruta') }}
			{{ Form::text('temperature', null, ['class' => 'form-control ']) }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('rate', 'Calidad de la fruta') }}
		{{ Form::select('rate', array('1' => '10%', '2' => '20%', '3' => '30%', '4' => '40%', '5' => '50%', '6' => '60%', '7' => '70%', '8' => '80%'), 
		null ,['class' => 'form-control','required' ,'placeholder'=>'Seleccione una nota'])}}
		</div>
	</div>
	
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('comment', 'Comentario (Maximo 200 caracteres)') }}
			{{ Form::textarea('comment', null, ['class' => 'form-control ',
			'maxlength' => '200'
			]) }}
		</div>
	</div>

</div>


<div class="row">

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
					value="1" 
					data-toggle="collapse" 
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

			<div class="col-md-8">
				<div class="form-group">
				{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
				</div>
			</div>
</div>


<div class="row">
		@if(session('info'))
			<div class="alert alert-success">
				{{session('info')}}
			</div>
	@endif
</div>

<script>
	$(function(){
		$('#fruit_id').on('change', onSelectProyectChange);
	});

	function onSelectProyectChange(){
		var fruit_id = $(this).val();
		
		if(! fruit_id){
			$('#variety_id').html('<Option value="">Seleccione Variedad</Option>');
				return;
		}
		// ajax

		$.get('/api/fruit/'+fruit_id+'/variedad', function(data){

			var html_select = '<Option value="">Seleccione Variedad</Option>';
			for(var i=0; i<data.length; ++i)
				html_select += '<Option value="'+data[i].id+'">'+data[i].variety+'</option>';
			$('#variety_id').html(html_select);
		});
	}
</script>
