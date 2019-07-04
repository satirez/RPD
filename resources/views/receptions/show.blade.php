@extends('layouts.dashboard')

@section('section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                    <h4 style="text-align:center;">Detalle de Recepcion
                   @can('receptions.edit')
                    <a href="{{ Route('receptions.edit', $reception->id) }}" class="btn btn-sm btn-info pull-right">Editar</a>
                    @endcan
                    </h4>
                </div>
                 

                
                    <div class="panel-body">
                            <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th> N° Tarja </th> 
                                    <th><h5>{{ $reception->tarja }}</h5></th>
                                </tr>

                                <tr>
                                    <th> Temporada </th>
                                    <th><h5> {{ $reception->season_id }}</h5></th>
                                </tr>
                                
                                <tr>
                                    <th> Peso bruto </th> 
                                    <th><h5>{{ $reception->grossweight }} Kg.</h5></th>
                                </tr>
                                <tr>
                                    <th> Peso Neto </th>
                                    <th><h5> {{ $reception->netweight }} Kg.</h5></th>
                                </tr>
                                
                                <tr>
                                    <th> Productor </th>
                                    <th><h5> {{ $reception->provider->name }}</h5></th>
                                </tr>
                                
                                <tr>
                                    <th> Fruta </th>
                                    <th><h5> {{ $reception->fruit_id }}</h5></th>
                                </tr>
                                
                                <tr>
                                    <th> Calidad </th>
                                    <th><h5> {{ $reception->quality_id }}</h5></th>
                                </tr>

                                <tr>
                                    <th> Bandejas ingresadas </th>
                                    <th><h5> {{ $reception->tray_in }}</h5></th>
                                </tr>

                                 <tr>
                                    <th> Bandejas salientes </th>
                                    <th><h5> {{ $reception->tray_out }}</h5></th>
                                </tr>
                                 <tr>
                                    <th> Nombre de conductor </th>
                                    <th><h5> {{ $reception->name_driver }}</h5></th>
                                </tr>
                                 <tr>
                                    <th> Nombre de guia </th>
                                    <th><h5> {{ $reception->number_guide }}</h5></th>
                                </tr>
                                <tr>
                                    <th> Temperatura de ingreso </th>
                                    <th><h5> {{ $reception->temperature }}</h5></th>
                                </tr>

                                 <tr>
                                    <th> Comentario </th>
                                    <th><h5> {{ $reception->comment }}</h5></th>
                                </tr>
                                

                               
                            </tbody>
                            </table>
                        </div>
                    </div>


            </div>
        </div>
     </div>
 </div>

 @endsection
