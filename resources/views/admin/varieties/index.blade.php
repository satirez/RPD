@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Variedades de frutas creadas
                    @can('admin.varieties.create')
                    <a href="{{ Route('admin.varieties.create') }}" class="btn btn-info pull-right btn-sm"> Crear nueva</a>
                    @endcan
                    </h4> 
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Variedad</th>
                               <th>Fruta </th>
                         
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       	
                        @foreach($varieties as $variety)
                           
                           <tr>
                                <td>{{ $variety->variety  }}</td>

                                <td>{{ $variety->fruit->specie  }}</td>

                                               			
                                <td width="10px">
                                    @can('admin.varieties.show')
                                    <a 
                                    href="{{ Route('admin.varieties.show', $variety->id) }}" 
                                    class="btn btn-sm btn-default">
                                          Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.varieties.edit')
                                    <a 
                                    href="{{ Route('admin.varieties.edit', $variety->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.varieties.destroy')
                                    {!! Form::open(['route' => ['admin.varieties.destroy', $variety->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    
							
                           </tr>
                        @endforeach

                       </tbody>
                   </table>
                   {{ $varieties->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 