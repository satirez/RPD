@extends('layouts.dashboard')
@section('section')
<div class="container">

        @if (\Session::has('success'))
            <div class="col-md-12">
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            </div>
        @endif


    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-0">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Procesos
                                @can('process.processes.create')
                                    <a href="{{ Route('process.processes.create') }}" class="btn btn-info pull-right btn-sm"> Crear </a>
                                @endcan
                            </h4>
                        
                    
                </div>

                 <div class="table-responsive">
                    <table id="laravel_datatable" class="table table-striped table-hover "> 
                       <thead>
                           <tr>
                               <th>Codigo de pallet procesado</th>
                               <th>Creado</th>
                               
                               <th colspan="auto">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                       </tbody>
                   </table>
                </div>
                <script>
                

                    $(document).ready(function() {
    
                        $('#laravel_datatable thead tr').clone(true).appendTo( '#laravel_datatable thead' );
                        $('#laravel_datatable thead tr:eq(1) th').each( function (i) {
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
                     
                        var table = $('#laravel_datatable').DataTable({
                                processing: true,
                                serverSide: true,
                                  language: {
                                   url: "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                                  },
                                 dom: 'Bfrtip',
                            buttons: [
                                'excel', 'pdf', 
                            ],
                                
                                
                            ajax: "{{ url('process-list') }}",
                            columns: [
                                { data: 'tarja_proceso', name: 'tarja_proceso' },
                                { data: 'created_at', name: 'created_at ' },
                            ]
                             });
                    } );



                        
                      
                   
            </script>
            </div>
        </div>
    </div>
</div>
@endsection
