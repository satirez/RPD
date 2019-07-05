@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Estatus
                    @can('admin.statuses.create')
                    <a href="{{ Route('admin.statuses.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                    </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Estatus</th>
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($statuses as $status)
                           <tr>
                                <td>{{ $status->name   }}</td>
                                <td width="10px">
                                    @can('admin.statuses.show')
                                    <a 
                                    href="{{ Route('admin.statuses.show', $status->id) }}" 
                                    class="btn btn-sm btn-default">
                                          Ver
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.statues.edit')
                                    <a 
                                    href="{{ Route('admin.statuses.edit', $status->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.statuses.destroy')
                                    {!! Form::open(['route' => ['admin.statuses.destroy', $status->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $statuses->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 