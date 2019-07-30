<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>



<div class="form-group">
	{{ Form::label('tarja_subprocceses', 'Numero de Tarja') }}
	{{ Form::text('tarja_subprocceses', 'RE00'.$lastid, ['class' => 'form-control','readonly']) }}
</div>

<div class="form-group">
	{{ Form::label('quantity', 'Nombre ') }}
	{{ Form::text('quantity', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Bandeja']) }}
</div>
	
<div class="form-group">
	{{ Form::label('format', 'Formato') }}
	{{ Form::text('format', null, ['class' => 'form-control input-number','placeholder'=>'ejemplo: 0.45']) }}
</div>

<div class="form-group">
	{{ Form::label('quality_id', 'Peso') }}
	{{ Form::text('quality_id', null, ['class' => 'form-control input-number','placeholder'=>'ejemplo: 0.45']) }}
</div>
<div class="form-group">
	{{ Form::label('status_id', 'Peso') }}
	{{ Form::text('status_id', null, ['class' => 'form-control input-number','placeholder'=>'ejemplo: 0.45']) }}
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

