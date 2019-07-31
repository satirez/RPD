<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<div class="form-group">
	{{ Form::label('name', 'Nombre del exportador:') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('rut', 'Rut:') }}
	{{ Form::text('rut', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('phone', 'Numero de contacto:') }}
	{{ Form::text('phone', null, ['class' => 'form-control input-number']) }}
</div>
<div class="form-group">
	{{ Form::label('email', 'E-mail:') }}
	{{ Form::text('email', null, ['class' => 'form-control ']) }}
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