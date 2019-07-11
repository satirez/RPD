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

    <div class="row my-3">
      <div class="col-md-4">
          <div class="card text-center">
              <div class="card-block">
                  <h4 class="card-title">Special Treatment</h4>
                  <h2><i class="fa fa-home fa-3x"></i></h2>
              </div>
              <div class="row px-2 no-gutters">
                  <div class="col-6">
                      <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">100</h3>
                  </div>
                  <div class="col-6">
                      <h3 class="card card-block border-0">70%</h3>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="card text-center">
              <div class="card-block">
                  <h4 class="card-title">Seasonal Deals</h4>
                  <h2><i class="fa fa-address-card-o fa-3x"></i></h2>
              </div>
              <div class="row px-2 no-gutters">
                  <div class="col-6">
                      <h3 class="card card-block border-top-0 border-left-0 border-bottom-0">85</h3>
                  </div>
                  <div class="col-6">
                      <h3 class="card card-block border-0">50%</h3>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-md-4">
          <div class="card text-center card-info">
              <div class="card-block">
                  <h4 class="card-title">Big Savings</h4>
                  <h2><i class="fa fa-coffee fa-3x"></i></h2>
              </div>
              <div class="row p-2 no-gutters">
                  <div class="col-6">
                      <div class="card card-block text-info rounded-0 border-left-0 border-top-o border-bottom-0">
                          <h3>75</h3>
                          <span class="small text-uppercase">items</span>
                      </div>
                  </div>
                  <div class="col-6">
                      <div class="card card-block text-info rounded-0 border-right-0 border-top-o border-bottom-0">
                          <h3>30%</h3>
                          <span class="small text-uppercase">savings</span>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

      
@stop
