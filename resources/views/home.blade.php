@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')


    <div class="card-group">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Procesos de Hoy {{ $cuentaProcess }} </h5>
            <p class="card-text"><small class="text-muted">
                <a href="{{ url ('processes') }}"> Crear Proceso </a>
            </small></p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
                <h5 class="card-title">Procesos de Hoy {{ $cuentaReception }} </h5>
            <p class="card-text"><small class="text-muted">
                    <a href="{{ url ('processes') }}"> Crear Recepcion </a>
                </small></p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
                <h5 class="card-title">Procesos de Hoy {{ $cuentaDispatch }} </h5>
            <p class="card-text"><small class="text-muted">
                    <a href="{{ url ('processes') }}"> Crear Despacho </a>
                </small></p>
          </div>
        </div>
      </div>

      
@stop
