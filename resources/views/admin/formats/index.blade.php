@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Lista de Formato Disponibles:
                    @can('admin.formats.create')
                    <a href="{{ Route('admin.formats.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan
                    </h4> 
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre del formato</th>
                               <th>Peso </th>
                               <th>Largo </th>
                               <th>Alto </th>
                               <th>Ancho </th>
                              
                         
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       	
                        @foreach($formats as $format)
                           
                           <tr>
                                <td>{{ $format->name  }}</td>
                                <td>{{ $format->weight  }} kg</td>
                                <td>{{ $format->largo  }} cm</td>
                                <td>{{ $format->alto  }} cm</td>
                                <td>{{ $format->ancho  }} cm</td>
                                
                                               			
                              
                                <td width="10px">
                                    @can('admin.formats.edit')
                                    <a 
                                    href="{{ Route('admin.formats.edit', $format->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.formats.destroy')
                                    {!! Form::open(['route' => ['admin.formats.destroy', $format->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    
							
                           </tr>
                        @endforeach

                       </tbody>
                   </table>
                   {{ $formats->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 