@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Insumos
                    @can('admin.subprocesses.create')
                    <a href="{{ Route('admin.subprocesses.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nª de tarja</th>
                               <th>Cantidad</th>
                               <th>Formato</th>
                               <th>Calidad</th>
                               <th>Status</th>
                               
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($subprocesses as $subprocesses)
                           <tr>
                                <td>{{ $subprocesses->name   }}</td>
                                <td>{{ $subprocesses->weight   }} kg</td>
                              
                    
                           
                                <td width="10px">
                                    @can('admin.subprocesses.edit')
                                    <a 
                                    href="{{ Route('admin.subprocesses.edit', $subprocesses->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.subprocesses.destroy')
                                    {!! Form::open(['route' => ['admin.subprocesses.destroy', $subprocesses->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $subprocesses->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 