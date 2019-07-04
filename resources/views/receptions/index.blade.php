@extends('layouts.dashboard')

@section('section')
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

<script>
        //js buscar
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
        <div class="col-md-12 col-md-offset-0">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                    <h4 style="text-align:center;">Recepcionados
                    @can('receptions.create')
                    <a href="{{ Route('receptions.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                    @endcan
                    </h4>
                </div>

                <div class="table-responsive">

                    <div class="form-group container">


                    </div>


                        <!--comienzo de la tabla-->
                    <table id="myTable" class="table table-hover ">
                    <br>
                        <div class="col-sm-3 pull-right">
                            <input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Buscar">
                        </div>
                        <br>
                        <thead>
                            <tr class="">
                                <th>Peso bruto</th>
                                <th>Peso neto</th>

                                <th>Proveedores</th>
                                <th>Fruta</th>
                                <th>Calidad</th>
                                
                                

                                <th>Nombre del Conductor</th>
                                <th>N° de guia</th>
                                <th>N° de tarja</th>
                                <th>creado</th>

                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receptions as $receptionslis)
                            <tr>
                                <td>{{ $receptionslis->grossweight  }} Kg.</td>
                                <td>{{ $receptionslis->netweight  }} Kg.</td>
                                <td>{{ $receptionslis->provider->name  }}</td>
                                <td>{{ $receptionslis->fruit->name  }}</td>
                                <td>{{ $receptionslis->quality->name  }}</td>
                                <td>{{ $receptionslis->name_driver  }}</td>
                                <td>{{ $receptionslis->number_guide }}</td>
                                <td>{{ $receptionslis->tarja }}</td>
                                <td>{{ $receptionslis->created_at }}</td>

                                <td width="8px">
                                    @can('receptions.show')
                                    <a href="{{ Route('receptions.show', $receptionslis->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                <td width="8px">
                                    @can('receptions.edit')
                                    <a href="{{ Route('receptions.edit', $receptionslis->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                <td>
                                <td width="8px">
                                    @can('receptions.destroy')
                                    {!! Form::open(['route' => ['receptions.destroy', $receptionslis->id],
                                    'method' => 'DELETE' ]) !!}
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                    @endcan
                                <td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $receptions->render() }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection