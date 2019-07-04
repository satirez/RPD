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

                <table id="myTable" class="table table-hover ">

                        <div class="col-sm-3 pull-right">
                        <br>
                    <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">
                    <br>
                       </div>
                        <thead>
                            <tr class="">
                             
                               <th>exportador</th>
                               <th>numero de patente</th>
                               <th>creado</th>

                               <th colspan="auto">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($listdispatches as $listdispatch)
                           <tr>
                                <td>{{ $listdispatch->exporter_id-6  }}</td>
                                <td>{{ $listdispatch->patentNo  }}</td>
                                <td>{{ $listdispatch->created_at }}</td>
                                

    
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
 