<div class="form-group">
	{{ Form::label('specie', 'Nombre de la fruta') }}
	{{ Form::text('specie', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('variety', 'Variedad') }}
	{{ Form::text('variety', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>