@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Control de Bandejas
                    @can('admin.trays.create')
                    <a href="{{ Route('admin.trays.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>bandejas de entrada</th>
                               <th>bandejas de salida</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       
                            @foreach($liststocks as $liststock)
                                 <tr>
                                     <td>{{ $liststock->provider->name   }} </td>
                                     <td>{{ $liststock->traysin   }} </td>
                                     <td>{{ $liststock->traysout   }} </td>
                              
                    
                           
                                <td width="10px">
                                    @can('admin.trays.edit')
                                    <a 
                                    href="{{ Route('admin.trays.edit', $tray->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.trays.destroy')
                                    {!! Form::open(['route' => ['admin.trays.destroy', $tray->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $liststocks->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 