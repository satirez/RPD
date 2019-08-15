@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">


            <div class="container">
                <h2>Recepciones</h2>
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>grossweight</th>
                            <th>Fruta</th>
                            <th>Provedor</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tbody> 

                    </tbody>
                </table>
            </div>
            <script>
                $(document).ready( function () {
                    $('#laravel_datatable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: "{{ url('users-list') }}",
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'tarja', name: 'tarja' },
                            { data: 'grossweight', name: 'grossweight' },
                            { data: 'fruit_id', name: 'fruit_id ' },
                            { data: 'provider_id', name: 'provider_id' },
                            { data: 'created_at', name: 'created_at' }
                        ]
                    });

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




                    var table = $('#laravel_datatable').DataTable( {
                        orderCellsTop: true,
                        fixedHeader: true
                    } );
                });

                

                
             
            </script>
        </div>
    </div>
</div>
@endsection}