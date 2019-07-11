<div class="form-group">
	{{ Form::label('name', 'Nombre del exportador') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('rut', 'Rut') }}
	{{ Form::text('rut', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('phone', 'Numero de contacto') }}
	{{ Form::text('phone', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('email', 'email') }}
	{{ Form::text('email', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

 