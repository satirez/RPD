@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Detalle de la temporada
                </div>

                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $season->nameSeason_Season   }}</p>
                    <p><strong>Fecha de Inicio</strong> {{ $season->yearSeason_Season  }}</p>
                    <p><strong>Fecha de Termino</strong> {{ $season->yearEnd_Season   }}</p>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@stop