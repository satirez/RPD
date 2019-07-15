@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Productores de Fruta
                    @can('admin.providers.create')
                    <a href="{{ Route('admin.providers.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Rut</th>
                               <th>Direccion</th>
                               <th>Numero Telefonico</th>

                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                           
                        
                        @foreach($providers as $provider)
                           
                           <tr>
                                <td>{{ $provider->name   }}</td>
                                <td>{{ $provider->rut   }}</td>
                                <td>{{ $provider->address }}</td>
                                <td>{{ $provider->number_phone }}</td>
                                
                                
                    			
                                <td width="10px">
                                    @can('admin.providers.show')
                                    <a 
                                    href="{{ Route('admin.providers.show', $provider->id) }}" 
                                    class="btn btn-sm btn-default">
                                     Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.providers.edit')
                                    <a 
                                    href="{{ Route('admin.providers.edit', $provider->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.providers.destroy')
                                    {!! Form::open(['route' => ['admin.providers.destroy', $provider->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    
							
                           </tr>
                        @endforeach

                       </tbody>
                   </table>
                   {{ $providers->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 