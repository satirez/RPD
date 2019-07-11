@extends('layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')


    <div class="container">
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
    </div>

    <div class="container">

        <div class="row my-3">
            <div class="col-md-4">
                <div class="card text-center card-info">
                    <div class="card-block">
                        <h4 class="card-title">Recepciones</h4>
                        <h2><i class="fa fa-boxes fa-3x"></i></h2>
                    </div>
                    <div class="row p-2 no-gutters">
                        <div class="col-6">
                            <div class="card card-block text-info rounded-0 border-left-0 border-top-o border-bottom-0">
                                <h3>{{ $cuentaProcess }}</h3>
                                <span class="small text-uppercase">Realizas</span>
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
            <div class="col-md-4">
                <div class="card text-center card-info">
                    <div class="card-block">
                        <h4 class="card-title">Procesos</h4>
                        <h2><i class="fa fa-pallet fa-3x"></i></h2>
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
                    <div class="row">
                        <div class="col-6">
                            <div class="card card-block text-info rounded-0 border-right-0 border-top-o border-bottom-0">
                                <p class="card-text"><small class="text-muted">
                                    <a class="form-group" href="{{ url ('processes') }}"> <span class="small text-uppercase"> Crear Proceso </span> </a>
                                </small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center card-info">
                    <div class="card-block">
                        <h4 class="card-title">Despachos</h4>
                        <h2><i class="fa fa-truck-loading fa-3x"></i></h2>
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
    
    </div>
    

      
@stop
