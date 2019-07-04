<div class="form-group">
	{{ Form::label('name', 'Nombre del exportador') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('patent', 'Patente Del exportador') }}
	{{ Form::text('patent', null, ['class' => 'form-control ']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

