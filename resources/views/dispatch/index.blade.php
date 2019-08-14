


@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Despachos
                    @can('dispatch.create')
                    <a href="{{ Route('dispatch.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan
                    </h4>
                </div>
                <table class="table table-bordered" id="laravel_datatable">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tipo de despacho </th>
                            <th>Consignatario</th>
                            <th>tipo transporte</th>
                            <th>Puerto de salida</th>
                            <th>Hora de creacion</th>
                        </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                </table>
                {{ $listdispatches->render() }}
            </div>
            <script>
                $(document).ready( function () {
     $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('dispatch-list') }}",
            columns: [
                     { data: 'id', name: 'id' },
                     { data: 'tipodispatch_id', name: 'tipodispatch_id' },
                     { data: 'consignatario', name: 'consignatario' },
                     { data: 'tipotransporte_id', name: 'tipotransporte_id' },
                     { data: 'puerto_salida', name: 'puerto_salida' },
                     { data: 'created_at', name: 'created_at' }
                  ]
         });
      });
            </script>
        </div>
    </div>
</div>
@endsection