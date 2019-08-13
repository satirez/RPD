@extends('layouts.dashboard')

@section('section')

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script> 
//buscar dinamico - tabla de despacho-index
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Despachos
                    @can('dispatch.create')
                    <a href="{{ Route('dispatch.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                    </h4>
                </div>
                        <!--comienzo de la tabla-->

                 <table class="table table-bordered" id="laravel_datatable">

                        <div class="col-sm-3 pull-right">
                        <br>
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">
                    <br>
                       </div>
                        
                        <thead>
                            <tr class="">
                             
                               <th>Id</th>
                               <th>Tipo de despacho </th>
                               <th>Consignatario</th>
                               <th>formato</th>
                               <th>cantidad</th>


                               <th colspan="auto">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($listdispatches as $listdispatch)
                           <tr>
                                <td>{{ $listdispatch->id  }}</td>
                                <td>{{ $listdispatch->tipodispatch  }}</td>
                                <td>{{ $listdispatch->consignatario }}</td>
                                <td>{{ $listdispatch->format }}</td>
                                <td>{{ $listdispatch->quantity }}</td>
                                    
                                <td width="8px">
                                    @can('dispatch.show')
                                    <a href="{{ Route('dispatch.show', $listdispatch->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                <td width="8px">
                                    @can('dispatch.edit')
                                    <a href="{{ Route('dispatch.edit', $listdispatch->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                <td>
                                <td width="8px">
                                    @can('dispatch.destroy')
                                    {!! Form::open(['route' => ['dispatch.destroy', $listdispatch->id],
                                    'method' => 'DELETE' ]) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                <td>    

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $listdispatches->render() }}

                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
 