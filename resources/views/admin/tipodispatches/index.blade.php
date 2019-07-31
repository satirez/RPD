@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Lista de Tipos de despachos:
                    @can('admin.tipodispatches.create')
                    <a href="{{ Route('admin.tipodispatches.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                                <th>Tipo de despacho</th>
                                <th>Descripción</th>
                                
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($tipodispatches as $tipodispatch)
                           <tr>
                            
                                <td>{{ $tipodispatch->name   }}</td>
                                <td>{{ $tipodispatch->description   }}</td>
                                
                        
                    
                                <td width="10px">
                                    @can('admin.tipodispatches.edit')
                                    <a 
                                    href="{{ Route('admin.tipodispatches.edit', $tipodispatch->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.tipodispatches.destroy')
                                    {!! Form::open(['route' => ['admin.tipodispatches.destroy', $tipodispatch->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $tipodispatches->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 