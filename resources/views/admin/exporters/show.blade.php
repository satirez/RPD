@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Detalle del Exportador</h4>
                        </div>


                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $exporter->name   }}</p>
                    <p><strong>Patente</strong> {{ $exporter->nPatent  }}</p>
                   
                   
                </div>
            </div>
        </div>
    </div>
</div>
@stop