@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Detalles del Insumo</h4>
                        </div>

                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $supplie->name   }}</p>
                    <p><strong>Peso</strong> {{ $supplie->weight   }}</p>
                    <p><strong>Medidas</strong> {{ $supplie->measure }}</p>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@stop