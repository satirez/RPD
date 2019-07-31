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

                    
                    <h4 style="text-align:center;">Control de bandejas
                    @can('receptions.create')
                    <a href="{{ Route('admin.trays.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
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
                                <th>N° de tarja</th>
                                <th>Estado</th>
                                <th>Peso bruto</th>
                                <th>Peso neto</th>
                                <th>N° Bandejas</th>
                                <th>Productor</th>
                                <th>Fruta</th>
                                <th>tipo Calidad</th>                               
                                <th>fecha/hora</th>
                                

                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receptions as $receptionslis)
                            <tr>
                                
                                <td>{{ $receptionslis->tarja }}</td>

                                <td> 
                                    @if($receptionslis->rejected == 1)
                                        <span class="badge badge-danger">Rechazado</span>
                                    
                                    @else
                                        <span class="badge badge-success">Disponible</span>
                                    
                                    @endif

                                </td>
                                
                                <td>{{ $receptionslis->grossweight  }} kg</td>
                                <td>{{ $receptionslis->netweight  }} kg</td>
                                <td>{{ $receptionslis->quantity }}</td>
                                <td>

                                    <a  href="{{ Route('admin.providers.show', $receptionslis->provider->id ) }}" >
                                     {{ $receptionslis->provider->name }} 
                                    </a>

                                </td>
                                <td>{{ $receptionslis->fruit->specie  }}</td>
                                <td>{{ $receptionslis->quality->name  }}</td>
                                <td>{{ $receptionslis->created_at }}</td>
                                

                                <td width="5px">
                                        @can('receptions.show')
                                        <a class="btn btn-primary" href="#"  onclick="changestate(this.id)" id="{{ $receptionslis->id}}" class="btn btn-sm btn-default changestate">estado</a>
                                        @endcan
                                    <td>
                                <td width="5px">
                                    @can('receptions.show')
                                    <a href="{{ Route('receptions.show', $receptionslis->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                <td width="5px">
                                    @can('receptions.edit')
                                    <a href="{{ Route('receptions.edit', $receptionslis->id) }}" class="btn btn-sm btn-info">Editar</a>
                                    @endcan
                                <td>
                                <td width="5px">
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

<script>
    function changestate(clicked){
       
        alert(clicked);

        if(confirm("Are you sure you want to Delete this data?"))
        {
            $.ajax({
                url:"{{route('receptions.change')}}",
                mehtod:"get",
                data:{id:clicked},
                success:function(data)
                {
                    alert(data);
                }
            })
        }
        else
        {
            return false;
        }
    }

</script>



@endsection