@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Detalle de la variedad</h4>
                        </div>

                <div class="panel-body">
                	<p><strong>Nombre de la variedad:</strong> {{ $variety->variety }}</p>
                    <p><strong>Especie de la fruta:</strong> {{ $variety->fruit->specie    }}</p>
                                                      
               
                </div>
            </div>
        </div>
    </div>
</div>
@stop
