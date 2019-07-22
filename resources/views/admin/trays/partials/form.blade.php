<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous">
</script>


<script type="text/javascript">

    function calcularhaber(){

    var traysin = document.getElementById('traysin').value;
    var traysout = document.getElementById('traysout').value;

    //Calcular haber
    var haber = (Number(traysin)) - (Number(traysout));
                
    document.getElementById('haber').value = haber;
    
    }
    
</script>



<div class="col-md-4">
		<div class="form-group">
		{{ Form::label('provider_id', 'Productor') }}
		{{Form::select('provider_id', $listProviders, null, ['class' => 'form-control',
        'required', 'placeholder'=>'Seleccione productor'])}}


	<div class="form-group">
		{{ Form::label('traysin', 'Entrada de bandejas') }}
		{{ Form::number('traysin', null, ['class' => 'form-control ',
        'id'=>'traysin',
        'onkeyup'=>'calcularhaber()']) }}
	</div>

	<div class="form-group">
		{{ Form::label('traysout', 'Salida de bandejas') }}
		{{ Form::number('traysout', null, ['class' => 'form-control ',
        'id'=>'traysout',
        'onkeyup'=>'calcularhaber()']) }}
	</div>
	<div class="form-group">
		{{ Form::label('haber', 'haber') }}
		{{ Form::number('haber', null, ['class' => 'form-control ',
        'id'=>'haber',
        'readonly'
       ]) }}
	</div>

	<div class="form-group">
		{{ Form::label('stock', 'Bandejas disponibles') }}
		{{ Form::number('stock', $stockbandejas, null, ['class' => 'form-control ', 'readonly']) }}
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
                                     <td>{{ $liststock->traysin   }} </td>
                                     <td>{{ $liststock->traysout   }} </td>
                                     

                                </tr>
                             @endforeach
                     
                       </tbody>
                   </table>
                 
                </div>
</div>

