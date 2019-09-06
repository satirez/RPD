@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="responsive">
        <div class="col-md-13 ">    

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">RECEPCION
                        @can('receptions.create')
                        <a target="_blank" href="{{ Route('receptions.create') }}"
                            class="btn btn-info pull-right btn-sm"> Crear </a>
                        @endcan
                    </h4>
                </div>
                <br>
                <br>
            <div class="panel panel-primary">
                        <div class="panel-heading">
                        <h4 style="text-align:center;">Total de Kilos Recepcionados: <strong style="color:green;">{{ $receptionWeight}}Kg</strong></h4>

                    </div>
                </div>
<br>
          
<div class="card">
    <div class="card-header">
        
        <h5 style="text-align:center;">Tabla de datos:</h5> 
    </div>
    <br>
                <div class="col-md-12">
                 <div class="table-responsive">
                    <!--comienzo de la tabla-->
                    <table id="laravel_datatable3"  class=" cell-border order-column">
                      
                         <thead>
                            <tr>
                                <th>Imprimir</th>
                                <th>Fecha Ingreso</th>
                                <th>N° de tarja</th> 
                                <th>Productor</th>
                                <th>Calidad</th>
                                <th>Fruta</th>
                                <th>Variedad</th>
                                <th>Cantidad de bandejas</th>
                                <th>Peso neto</th>
                                <th>Peso bruto</th>
                                <th>Ver</th>

                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                        
                           
      
                        </tfoot>
                    </table>


                    

                  </div>    
                </div>                          
                </div>

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
               
                order: [[ 0, 'desc' ]], //cambiar dspues
                iDisplayLength: 100,
                language: {
                url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                },
                
            
            
            
            ajax: "{{ url('reception-list') }}",
            columns: [
                {
                    data: 'id',
                        "render": function(data, type, row, meta) {
                            if (type === 'display') {
                                data = '<a class="btn btn-sm btn-primary" target="_blank" href="print/' + data + '">Imprimir</a>';
                            }

                            return data;
                            },
                          

                            

                        },
                     { data: 'created_at', name: 'created_at' },
                     { data: 'tarja', name: 'tarja' },
                     { data: 'provider', name: 'provider.name' },
                     { data: 'quality', name: 'quality.name' },
                     { data: 'fruit', name: 'fruit.specie' },
                     { data: 'fruit', name: 'fruit' },
                     { data: 'quantity', name: 'quantity' },
                     { data: 'netweight', name: 'netweight' },
                     { data: 'grossweight', name: 'grossweight' },
                     
                     
                   
                     {
                            data: 'id',
                                "render": function(data, type, row, meta) {
                                    if (type === 'display') {
                                        data = '<a href="receptions/' + data + '">Ver</a>';
                                    }

                                    return data;
                                    },
                                  
                     },

              
                ]
         });
} );

 


</script>
</div>
</div>



@endsection