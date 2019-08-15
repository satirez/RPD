@extends('layouts.dashboard')

@section('section')
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
                    <table id="laravel_datatable" class="table table-hover ">
                        <br>
                        <br>
                        <thead>
                            <tr class="table-dark text-dark">
                                <th>N° de tarja</th>
                                <th>Estado</th>
                                <th>Peso bruto</th>
                                <th>Peso neto</th>
                                <th>N° Bandejas</th>
                                <th>Productor</th>
                                <th>Fruta</th>
                                <th>Tipo Calidad</th>                               
                                <th>Fecha/Hora</th>
                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>  
                        </tbody>
                    <tfoot>
                    <tr>
                            <td>
                                <select data-column="0" class="form-control filter-select">
                                <option value="">selecciona...</option>
                                @foreach( $names as $name)
                                <option value=" {{name}} "> {{name}} </option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    
                </div>                        
            </div>
        </div>
        <script>
                $(document).ready( function () {
                var table = $('#laravel_datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('reception-list') }}",
                        columns: [
                            { data: 'tarja', name: 'tarja' },
                            { data: 'available', name: 'available' },
                            { data: 'grossweight', name: 'grossweight' },
                            { data: 'netweight', name: 'netweight' },
                            { data: 'quantity', name: 'quantity' },
                            { data: 'provider_id', name: 'provider_id' },
                            { data: 'fruit_id', name: 'fruit_id '},
                            { data: 'quality_id', name: 'quality_id'},
                            { data: 'created_at', name: 'created_at' }
                        ]
                    });
                });

            $('filter-select').change(function {
                table.column($(this).data('column')).search($(this).val()).draw();
            });


            $(document).ready(function() {
    $('#laravel_datatable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
            </script>    
    </div>
</div>
@endsection