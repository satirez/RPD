<div class="form-group">
	{{ Form::label('name', 'Motivo de rechazo') }}
	{{ Form::text('name', null, ['class' => 'form-control ', 'placeholder'=>'ejemplo: Metales']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>