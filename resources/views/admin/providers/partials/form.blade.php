<div class="form-group">
	{{ Form::label('name', 'Nombre y Apellido del proveedor') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('rut', 'Rut del Proveedor') }}
	{{ Form::text('rut', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::label('address', 'Direccion del proveedor') }}
	{{ Form::text('address', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('number_phone', 'Numero telefonico del proveedor') }}
	{{ Form::text('number_phone', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

