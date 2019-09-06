@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Despachos
                    @can('dispatch.create')
                    <a href="{{ Route('dispatch.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                    </h4>
                </div>

               <div class="card-body"> 
                <table class="table table-responsive" id="laravel_datatable3" style="width:100%">
                    <thead>
                            <th></th>
                            <th>Id</th>
                            <th>Tipo de Despacho </th>
                            <th>Consignatario</th>
                            <th>Tipo Transporte</th>
                            <th>Puerto de Salida</th>
                            <th>Hora de Creación</th>
                        
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
                
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
             iDisplayLength: 100,
             order: [[ 0, 'desc' ]],

        processing: true,
        serverSide: true,
        dom: 'Bfrtip',

        buttons: [
        'excel', 'pdf', 
        ],
        iDisplayLength: 50,
        language: {
        url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        dom: 'Bfrtip',
    buttons: [
        'excel', 'pdf', 
    ],
            
            
            ajax: "{{ url('dispatch-list') }}",
            columns: [
                {
                    data: 'id',
                        "render": function(data, type, row, meta) {
                            if (type === 'display') {
                                data = '<a class="btn btn-sm btn-primary" target="_blank" href="printdispatch/' + data + '">Imprimir</a>';
                            }

                            return data;
                            },
                          
                        },
                     { data: 'id', name: 'id' },
                     { data: 'tipodispatch', name: 'tipodispatch.name' },
                     { data: 'consignatario', name: 'consignatario' },
                     { data: 'tipotransporte', name: 'tipotransporte.name' },                 
                     { data: 'season', name: 'season.name' },
                     { data: 'created_at', name: 'created_at' },
                     
                  ]
         });
} );



      
</script>

          

        </div>
    </div>
</div>
@endsection

