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
    
	function cal() {
		
	}

      
</script>






<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('provider_id', 'Productor') }}
		{{Form::select('provider_id', $listProviders, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione productor'])}}


	<div class="form-group">
		{{ Form::label('traysin', 'Bandejas que llegaron') }}
		{{ Form::text('traysin', null, ['class' => 'form-control ']) }}
	</div>

	<div class="form-group">
		{{ Form::label('traysout', 'Bandejas devueltas') }}
		{{ Form::text('traysout', null, ['class' => 'form-control ']) }}
	</div>


	<div class="form-group">
		{{ Form::label('providerTrays', 'Bandejas entrantes') }}
		{{ Form::text('providerTrays', null, ['class' => 'form-control ', 'readonly']) }}
	</div>

	<div class="form-group">
		{{ Form::label('freezTrays', 'Bandejas de Freez') }}
		{{ Form::text('freezTrays', null, ['class' => 'form-control ', 'readonly']) }}
	</div>

	<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	</div>
</div>