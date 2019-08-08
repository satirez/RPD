<div class="form-group">
	{{ Form::label('name', 'Nombre del producto a despachar:') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>

