<div class="form-group">
	{{ Form::label('reason', 'Nombre del motivo de rechazo') }}
	{{ Form::text('reason', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('description', 'Descripción del rechazo') }}
	{{ Form::text('description', null, ['class' => 'form-control ']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>