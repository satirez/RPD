@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                  <h4 style="text-align:center;"> Calidad
                    @can('admin.quality.create')
                    <a href="{{ Route('admin.quality.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Descripción</th>
                              
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       	
                        @foreach($qualyties as $quality)
                           
                           <tr>
                                <td>{{ $quality->name   }}</td>
                                <td>{{ $quality->description   }}</td>
                    
                    		
                                <td width="10px">
                                    @can('admin.quality.edit')
                                    <a 
                                    href="{{ Route('admin.quality.edit', $quality->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.quality.destroy')
                                    {!! Form::open(['route' => ['admin.quality.destroy', $quality->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    
							
                           </tr>
                        @endforeach

                       </tbody>
                   </table>
                   {{$qualyties->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 