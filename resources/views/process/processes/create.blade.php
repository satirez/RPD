@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Crear Nuevo Proceso</h4>
                        </div>

                <div class="panel-body">
                	{!! Form::open(['route' => 'process.processes.store']) !!} 

                	@include('process.processes.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>


 <!-- Tabla -->
   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Lista de Procesos</h4>
                        </div>

                 <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                               <th>Tarja de Proceso</th>
                               <th>N° cajas realizadas</th>
                               <th>Creado</th>
                             
                              
                               <th colspan="auto">&nbsp;</th>
                           </tr>
                       </thead>
                          <tbody>
                        @foreach($processeslist as $processlist)
                           <tr>                               
                                <td>{{ $processlist->tarja_proceso }}</td>
                                <td>{{ $processlist->Box_out  }}</td>
                                <td>{{ $processlist->created_at  }}</td>
                               
                                

                                <td width="10px">
                                    @can('process.processes.show')
                                    <a href="{{ Route('process.processes.show', $processlist->id) }}" class="btn btn-info pull-right btn-sm">Ver</a>
                                    @endcan
                                <td>
                                
                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $processeslist->render() }}

                </div>
            </div>
        </div>
    </div>
    
  </div>
  </div>
@stop


