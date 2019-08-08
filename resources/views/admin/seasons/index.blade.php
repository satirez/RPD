@extends('layouts.dashboard')
@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Temporadas
                    @can('admin.seasons.create')
                    <a href="{{ Route('admin.seasons.create') }}" class="btn btn-info pull-right"> Crear </a>
                    @endcan 
                    </h4>
                </div>

                <div class="panel-body">
                   <table class="table table-striped table-hover"> 
                       <thead>
                           <tr>
                               <th>Nombre de Temporada</th>
                              <th>Inicio</th>
                              <th>Termino</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($seasons as $season)
                           <tr>
                                <td>{{ $season->name   }}</td>
                                <td>{{ $season->start_date   }}</td>
                                <td>{{ $season->end_date   }}</td>


                        
                    
                                <td width="10px">
                                    @can('admin.seasons.edit')
                                    <a 
                                    href="{{ Route('admin.seasons.edit', $season->id) }}" 
                                    class="btn btn-sm btn-info">
                                          Editar
                                    </a>
                                    @endcan
                                </td>
                                <td width="10px">
                                    
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#exampleModalCenter{{$season->id}}">
                                        Eliminar
                                    </button>
                                </td>    

                           </tr>
                              <!-- Modal -->
                              <div class="modal fade" id="exampleModalCenter{{$season->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Esta seguro que desea eliminar?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-secondary"
                                                data-dismiss="modal">Cerrar</button>
                                                @can('admin.seasons.destroy')
                                    {!! Form::open(['route' => ['admin.seasons.destroy', $season->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan </div>
                                    </div>
                                </div>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $seasons->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

 