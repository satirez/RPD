@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Insumos
                    @can('admin.exporters.create')
                    <a href="{{ Route('admin.exporters.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                                <th>Nombre</th>
                                <th>Rut</th>
                                <th>Numero Telefónico</th>
                                <th>e-mail</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($exporters as $exporter)
                           <tr>
                            
                                <td>{{ $exporter->name   }}</td>
                                <td>{{ $exporter->rut   }}</td>
                                <td>{{ $exporter->phone   }}</td>
                                <td>{{ $exporter->email   }}</td>
                        
                    
                                <td width="10px">
                                    @can('admin.exporters.show')
                                    <a 
                                    href="{{ Route('admin.exporter.show', $exporter->id) }}" 
                                    class="btn btn-sm btn-default">
                                          Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.exporters.edit')
                                    <a 
                                    href="{{ Route('admin.exporters.edit', $exporter->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.exporters.destroy')
                                    {!! Form::open(['route' => ['admin.exporters.destroy', $exporter->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $exporters->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 