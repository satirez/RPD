<div class="form-group">
	{{ Form::label('name', 'Nombre del tipo de calidad') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción de esta calidad') }}
	{{ Form::text('description', null, ['class' => 'form-control ']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>