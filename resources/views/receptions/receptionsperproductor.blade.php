  @extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">


            <div class="container">
                <h2>Recepciones</h2>
                <table class="table table-bordered" id="laravel_datatable2">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Peso Bruto</th>
                            <th>Fruta</th>
                            <th>Bandejas</th>
                            <th>Temporada</th>
                            <th>Provedor</th>
                            <th>Created at</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>
                            </td>
                            <td>
                                <input type="text" class="form-control filter-input" data-column="1">
                            </td>
                            <td>
                                <input type="text" class="form-control filter-input" data-column="2">
                            </td>
                            <td>
                                <input type="text" class="form-control filter-input" data-column="3">
                            </td>
                            <td>
                                <input type="text" class="form-control filter-input" data-column="4">
                            </td>
                            <td>
                                <input type="text" class="form-control filter-input" data-column="5">
                            </td>
                            <td>
                                <input type="text" class="form-control filter-input" data-column="6">
                            </td>
                            <td>
                            </td>
                        </tr>
                    </tfoot>

                </table>
            </div>
            <script>
                $(document).ready( function () {
     $('#laravel_datatable2').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('reception-list') }}",
            columns: [
                     { data: 'id', name: 'id' },
                     { data: 'tarja', name: 'tarja' },
                     { data: 'grossweight', name: 'grossweight' },
                     { data: 'fruit', name: 'fruit.specie' },
                     { data: 'supplies', name: 'supplies.name' },
                     { data: 'season', name: 'season.name' },
                     { data: 'provider', name: 'provider.name' },
                     { data: 'created_at', name: 'created_at' }
                  ]
         });
      });

      $('.filter-input').keyup(function() {
          table.columm( $(this).data('column') )
          .search( $(this).val() )
          .draw();
      });
      
            </script>
        </div>
    </div>
</div>
@endsection