@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 style="text-align:center;"> Motivos de Rechazos
                    @can('admin.rejecteds.create')
                    <a href="{{ Route('admin.rejecteds.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre de motivo</th>
                              
                              
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       	
                        @foreach($rejecteds as $rejected)
                           
                           <tr>
                                <td>{{ $rejected->name   }}</td>
                                
                    
                    			
                                <td width="10px">
                                    @can('admin.rejecteds.show')
                                    <a 
                                    href="{{ Route('admin.rejecteds.show', $rejected->id) }}" 
                                    class="btn btn-sm btn-default">
                                          Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.rejecteds.edit')
                                    <a 
                                    href="{{ Route('admin.rejecteds.edit', $rejected->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.rejecteds.destroy')
                                    {!! Form::open(['route' => ['admin.rejecteds.destroy', $rejected->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    
							
                           </tr>
                        @endforeach

                       </tbody>
                   </table>
                   {{$rejecteds->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 