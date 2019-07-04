<div class="form-group">
	{{ Form::label('name', 'Nombre del insumo') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('weight', 'Peso') }}
	{{ Form::text('weight', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('measure', 'Medida') }}
	{{ Form::text('measure', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

