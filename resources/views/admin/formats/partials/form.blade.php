<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>

<div class="form-group">
	{{ Form::label('name', 'Nombre de formato') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('largo', 'Altura') }}
	{{ Form::text('largo', null, ['class' => 'form-control input-number', 'placeholder'=>'cm']) }}
</div>
<div class="form-group">
	{{ Form::label('alto', 'Largo') }}
	{{ Form::text('alto', null, ['class' => 'form-control input-number', 'placeholder'=>'cm']) }}
</div>
<div class="form-group">
	{{ Form::label('ancho', 'Ancho') }}
	{{ Form::text('ancho', null, ['class' => 'form-control input-number', 'placeholder'=>'cm']) }}
</div>

<div class="form-group">
	{{ Form::label('weight', 'Peso (ejem: 0.2)') }}
	{{ Form::text('weight', null, ['class' => 'form-control input-number', 'placeholder'=>'kg']) }}
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