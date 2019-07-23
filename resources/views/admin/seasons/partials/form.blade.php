<div>
<div class="form-group">
	{{ Form::label('name', 'Temporada') }}
	{{ Form::select('name', array('1°Verano' => '1°Verano', '2°Otoño' => '2°Otoño', '3°Invierno' => '3°Invierno', '4°Primaver' => '4°Primavera'), null, ['class' => 'form-control', 'class' => 'col-md-4']) }}
</div>
</div>
<div class="form-group">
	{{ Form::label('start_date', 'Fecha Ingreso') }}
	{{ Form::date('start_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
</div>
	

<div class="form-group">
	{{ Form::label('end_date', 'Fecha Finalizacion') }}
	{{ Form::date('end_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
</div>
	


<div class="form-group">
	{{ Form::submit('Guardar', ['class' => 'btn btn-success']) }}
</div>

