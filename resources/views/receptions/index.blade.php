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
                    <table id="laravel_datatable3" class="table responsive ">
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
                                <th>Ver</th>
                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>  
                        </tbody>
                    <tfoot>
                    </table>
                  </div>    
                </div>                          
            </div>
        </div>
        <script>
            $(document).ready(function() {
    
    $('#laravel_datatable3 thead tr').clone(true).appendTo( '#laravel_datatable3 thead' );
    $('#laravel_datatable3 thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Buscar '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#laravel_datatable3').DataTable({
            processing: true,
            serverSide: true,
              language: {
               url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
              },
             dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 
        ],
            
            
            ajax: "{{ url('reception-list') }}",
            columns: [
                     { data: 'tarja', name: 'tarja' },
                     { data: 'available', name: 'available' },
                     { data: 'grossweight', name: 'grossweight' },
                     { data: 'netweight', name: 'netweight' },
                     { data: 'quantity', name: 'quantity' },
                     { data: 'provider', name: 'provider.name' },
                     { data: 'fruit', name: 'fruit.specie' },
                     { data: 'quality', name: 'quality.name' },
                     { data: 'created_at', name: 'created_at' },
                     { data: 'created_at', name: 'created_at' },
                     {
                                "data": 'id',
                                "render": function(data, type, row, meta) {
                                    if (type === 'display') {
                                        data = '<a href="receptions/' + data + '">Ver</a>';
                                    }

                                    return data;
                                    }
                     }
                ]
         });
} );

            </script>    
    </div>
</div>
@endsection