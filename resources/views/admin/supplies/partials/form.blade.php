<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<div class="form-group">
	{{ Form::label('name', 'Nombre ') }}
	{{ Form::text('name', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Bandeja']) }}
</div>
	
<div class="form-group">
	{{ Form::label('weight', 'Peso') }}
	{{ Form::text('weight', null, ['class' => 'form-control input-number','placeholder'=>'ejemplo: 0.45']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>

<!-- Permitir solo numeros, puntos y X-->
<script type="text/javascript">
	$(document).ready(function (){
  $('.input-number').keyup(function (){
	this.value = (this.value + '').replace(/[^.x0-9]/g, '');
  });
});
</script>

