@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Tipos de fruta disponibles
                    @can('admin.fruits.create')
                    <a href="{{ Route('admin.fruits.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan
                    </h4> 
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre de la fruta</th>
                               <th>Variedad </th>
                         
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       	
                        @foreach($fruits as $fruit)
                           
                           <tr>
                                <td>{{ $fruit->specie  }}</td>
                                <td>{{ $fruit->variety  }}</td>
                                               			
                                <td width="10px">
                                    @can('admin.fruits.show')
                                    <a 
                                    href="{{ Route('admin.fruits.show', $fruit->id) }}" 
                                    class="btn btn-sm btn-default">
                                          Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.fruits.edit')
                                    <a 
                                    href="{{ Route('admin.fruits.edit', $fruit->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.fruits.destroy')
                                    {!! Form::open(['route' => ['admin.fruits.destroy', $fruit->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    
							
                           </tr>
                        @endforeach

                       </tbody>
                   </table>
                   {{ $fruits->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 