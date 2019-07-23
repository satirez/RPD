<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<div class="form-group">
	{{ Form::label('name', 'Nombre y Apellido:') }}
	{{ Form::text('name', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Nombre Apellido Apellido']) }}
</div>
<div class="form-group">
	{{ Form::label('rut', 'Rut:') }}
	{{ Form::text('rut', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: 12345678-9']) }}
</div>

<div class="form-group">
	{{ Form::label('address', 'Direccion:') }}
	{{ Form::text('address', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Camino Caran #345']) }}
</div>
<div class="form-group">
	{{ Form::label('number_phone', 'Numero de Contacto:') }}
	{{ Form::text('number_phone', null, ['class' => 'form-control input-number', 'placeholder'=>'ejemplo: 42-123456']) }}
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