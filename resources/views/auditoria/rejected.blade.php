@extends('layouts.dashboard')

@section('section')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Despachos</h4>
                        </div>


                <div class=" col-md-4">
                <p>Filtrar:</p>  
                <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
                <br>
                </div>
               
                 <div class="panel-body">
                    <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Selección</th>
                            <th>Tarja</th>
                            <th>Formato</th>
                            <th>Calidad</th>
                            <th>Fruta - Variedad</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <script>
                     
                        </script>
                        @forelse($rejecteds as $rejected)
                        <tr>
                            <td>{{ Form::checkbox('rejecteds[]', $rejected->id, null, ['value'=>'$rejected->id']) }}
                            </td>
                            <td>SP00{{ $rejected->id }}</td>
                            <td>{{ $rejected->format->name }}</td>
                            <td>{{ $rejected->quality->name }}</td>
                            <td>{{ $rejected->fruit->specie}} - {{ $rejected->varieties->variety }}</td>

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
				    </table>
                </div>
            </div>
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
                
    

</div>
</div>
<br>
@if($uno == false)
    {!! Form::open(['route' => 'auditoria.store']) !!} 
<div class="col-md-12 text-center">
    <div class="form-group">
        {{ Form::submit('habilitar pallet', ['class' => 'btn btn-success']) }}
    </div>
    @else
    <div class="btn btn-lg btn-danger disabled"> No se puede ingresar </div>
        @endif
    {!! Form::close() !!}
</div>
     
@endsection
