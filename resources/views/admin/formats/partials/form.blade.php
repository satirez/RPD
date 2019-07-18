<div class="form-group">
	{{ Form::label('name', 'Nombre de formato') }}
	{{ Form::text('name', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('largo', 'Altura') }}
	{{ Form::text('largo', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('alto', 'Largo') }}
	{{ Form::text('alto', null, ['class' => 'form-control ']) }}
</div>
<div class="form-group">
	{{ Form::label('ancho', 'Ancho') }}
	{{ Form::text('ancho', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::label('weight', 'peso') }}
	{{ Form::text('weight', null, ['class' => 'form-control ']) }}
</div>

<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>



