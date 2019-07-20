@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Insumos
                    @can('admin.supplies.create')
                    <a href="{{ Route('admin.supplies.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan 
                  </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre</th>
                               <th>Peso</th>
                               <th>Medida</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($supplies as $supplie)
                           <tr>
                                <td>{{ $supplie->name   }}</td>
                                <td>{{ $supplie->weight   }} kg</td>
                                <td>{{ $supplie->measure }} cm</td>
                    
                           
                                <td width="10px">
                                    @can('admin.supplies.edit')
                                    <a 
                                    href="{{ Route('admin.supplies.edit', $supplie->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    @can('admin.supplies.destroy')
                                    {!! Form::open(['route' => ['admin.supplies.destroy', $supplie->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                </td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $supplies->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 