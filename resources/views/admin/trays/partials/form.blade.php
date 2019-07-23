<div class="col-md-12">

    <div class="row">

        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('provider_id', 'Productor') }}
                {{Form::select('provider_id', $listProviders, null, ['class' => 'form-control',
                'required', 'placeholder'=>'Seleccione productor'])}}
            </div>
            </div>

            <div class="form-group">
                {{ Form::label('traysin', 'Cantidad de bandejas') }}
                {{ Form::number('traysin', null, ['class' => 'form-control ',
                'id'=>'traysin',
                'onkeyup'=>'calcularhaber()']) }}
            </div>

            
            <div class="form-group">
            {{ Form::label('rate', 'Acción') }}
            {{ Form::select('accion', array('1' => 'Entrada', '2' => 'Salida'), 
            null ,['class' => 'form-control','required' ,'placeholder'=>'Seleccione acción',
            'id'=>'accion',
            'OnClick'=> 'calcularhaber()'])}}
            </div>

        </div>

    </div>


	<div class="form-group">
		{{ Form::label('stock', 'Bandejas disponibles') }}
		{{ Form::number('stock', $stockbandejas, null, ['class' => 'form-control ', 'readonly',
        'id'=>'stockbandejas']) }}
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
