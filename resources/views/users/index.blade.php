@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuarios  
                     @can('users.create')
                    <a href="{{ Route('users.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan                
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                              
                               <th>Nombre y Apellido</th>
                               <th>Rut</th>
                               <th colspan="2">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($users as $user)
                           <tr>
                                
                                <td>{{ $user->name  }}</td>
                                <td>{{ $user->email  }}</td>
                               
                                <td width="10px">
                                    @can('users.edit')
                                    <a href="{{ Route('users.edit', $user->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                <td>
                                <td width="10px">
                                    @can('users.destroy')
                                    {!! Form::open(['route' => ['users.destroy', $user->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                <td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $users->render() }}
                </div>

            </div>
        </div>
    </div>
</div>
@stop
 