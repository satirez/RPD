@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Detalle del formato</h4>
                        </div>

                <div class="panel-body">
                	<p><strong>Nombre de formato:</strong> {{ $format->name    }}</p>
                    <p><strong>Largo:</strong> {{ $format->largo    }}</p>
                    <p><strong>Alto:</strong> {{ $format->alto    }}</p>
                    <p><strong>Ancho:</strong> {{ $format->ancho    }}</p>
                                   
  
                </div>
            </div>
        </div>
    </div>
</div>
@stop