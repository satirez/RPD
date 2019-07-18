<div class="form-group">
	{{ Form::label('specie', 'Nombre de la fruta') }}
	{{ Form::text('specie', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>