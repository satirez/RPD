@extends('layouts.dashboard')

@section('section')
<div class=" col-md-4">
            <p>Filtrar:</p>  
            <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
            <br>
</div>

   {!! Form::open(['route' => 'rejected']) !!}
        
<table  class="table table-bordered responsive">
                    <thead>
                        <tr class="">
                            <th></th>
                            <th>Tarja</th>
                            <th>Formato</th>
                            <th>Calidad</th>
                            <th>Fruta - Variedad</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <script>
                        var receptionArray = [];
                        </script>
                        @forelse($rejecteds as $rejected)
                        <tr>
                            <td>{{ Form::checkbox('rejecteds[]', $rejected->id, null, ['value'=>'$rejected->id']) }}
                            </td>
                            <td>SP00{{ $rejected->id }}</td>
                            <td>{{ $rejected->format->name }}</td>
                            <td>{{ $rejected->quality->name }}</td>
                            <td>{{ $rejected->fruit->specie}} - {{ $rejected->varieties->variety }}</td>
                            <script>

                            //Mostrar los 'Lotes' (availables) y mostrar 'SubProcesses' (availables) para
                            //enviarlos al coontrolador
                            //updatearlos Boool


                            </script>
                            @php
                            $uno = false;
                            @endphp
                        </tr>

                        @empty
                        <h4> Sin Registros </h4>
                        @php
                        $uno = true;
                        @endphp
                        @endforelse
                    </tbody>
				
                    <script>
                $(document).ready(function(){
                    $("#myInput").on("keyup", function() {
                        var value = $(this).val().toLowerCase();
                        $("#myTable tr").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                    });
                });
            </script>
                
    </table>
    {!! Form::close() !!}



                <br>
    @if($uno == false)
    <div class="col-md-12 text-center">
        <div class="form-group text">
            {{ Form::submit('ABILITAR PALLET', ['class' => 'btn btn-success']) }}
        </div>
    </div>
    @else
    <div class="btn btn-lg btn-danger disabled"> No se puede ingresar </div>
    @endif
    <br>
    <br>
                @stop