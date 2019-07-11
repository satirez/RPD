<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

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
        var txtSecondNo = document.getElementById('supplie').value;
        var txtThirdNo = document.getElementById('quantity').value;
        var palet = document.getElementById('palet').value;

        //Calcular peso neto
        var result = (Number(txtFirstNo)-(Number(txtThirdNo) * Number(txtSecondNo)))-Number(palet);
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
		{{ Form::label('quality_id', 'status de la fruta') }}
		{{Form::select('quality_id', $listQualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
		</div>
	</div>

	
</div>

<div class="row">
	
	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('provider_id', 'Selecciona un proveedor') }}
		{{Form::select('provider_id', $listProviders, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
		</div>
	</div>

	<div class="col-md-4">
			<div class="form-group">
			{{ Form::label('status_id', 'Selecciona un estado') }}
			{{Form::select('status_id', $listStatus, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
			</div>
		</div>

	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('fruit_id', 'Selecciona un tipo de fruta') }}
		{{Form::select('fruit_id', $listFruits, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
		</div>
	</div>

	

	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('season_id', 'Selecciona la temporada') }}
		{{Form::select('season_id', $listSeasons, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('supplies_id', 'Selecciona un Insumo') }}
		{{Form::select('', $listSupplies, null, ['class' => 'form-control','required',
		'onclick'=>'rest()',
		'id'=>'supplie',
		 'placeholder'=>'Seleccione una opción'])}}
		</div>
	</div>

	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('quantity', 'Cantidad de bandejas') }}
			{{ Form::number('', null, ['class' => 'form-control ',
			'onkeyup'=>'rest()',
			'onKeyPress'=>'coma(event)',
			'id'=>'quantity'
			]) }}
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
</div>

<div class="row">
	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('palet', 'Peso del palet') }}
			{{ Form::number('', null, ['class' => 'form-control ',
			'onkeyup'=>'rest()',
			'onKeyPress'=>'coma(event)',
			'id'=>'palet'
			]) }}
		</div>
	</div>

	<div class="col-md-4">		
		<div class="form-group">
			{{ Form::label('netweight', 'Peso neto') }}
			{{ Form::text('netweight', null, ['class' => 'form-control ', 'id'=>'netweight','readonly'
			]) }}
		</div>
	</div>

	<!-- label que muestra el peso medio de fruta por bandeja -->
	<div class="col-md-4">
		<div class="form-group">
			{{ Form::label('middleweight_trays', 'Gr de fruta por bandeja') }}
			{{ Form::number('middleweight_trays', null, ['class' => 'form-control ','id'=>'middleweight_trays', 'readonly']) }}
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
			{{ Form::label('name_driver', 'nombre del conductor') }}
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
										{{ ::textarea('commentrejected',null,['class'=>'form-control'])}}

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
				{{ Form::submit('Guardar', ['class' => 'btn btn-lg btn-primary']) }}
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
