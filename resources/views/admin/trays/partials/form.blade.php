<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('provider_id', 'Productor') }}
		{{Form::select('provider_id', $listProviders, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione productor'])}}


	<div class="form-group">
		{{ Form::label('traysin', 'Bandejas que llegaron') }}
		{{ Form::number('traysin', null, ['class' => 'form-control ']) }}
	</div>

	<div class="form-group">
		{{ Form::label('traysout', 'Bandejas devueltas') }}
		{{ Form::number('traysout', null, ['class' => 'form-control ']) }}
	</div>

	<div class="form-group">
		{{ Form::label('stock', 'Bandejas disponibles') }}
		{{ Form::number('stock', $stockbandejas, null, ['class' => 'form-control ', 'ReadOnly']) }}
	</div>


	<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	</div>
</div>

<div class="col-md-10">
<div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>bandejas de entrada</th>
                               <th>bandejas de salida</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($liststocks as $liststock)
                           <tr>
                                <td>{{ $liststock->provider->name   }} </td>
                         
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                 
                </div>
</div>

