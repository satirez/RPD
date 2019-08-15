@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Despachos
                    @can('dispatch.create')
                    <a href="{{ Route('dispatch.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                    </h4>
                </div>

               <div class="card-body"> 
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        
                            <th>Id</th>
                            <th>Tipo de Despacho </th>
                            <th>Consignatario</th>
                            <th>Tipo Transporte</th>
                            <th>Puerto de Salida</th>
                            <th>Hora de Creación</th>
                        
                    </thead>
                    <tbody>
               
                    </tbody>
                </table>
                
            </div>
            </div>

          

        </div>
    </div>
</div>
@endsection

