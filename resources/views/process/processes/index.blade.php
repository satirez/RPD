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
                               <th>Tarja</th>
                               <th >N° de procesos realizados</th>
                               <th>Creado</th>
                               
                               <th colspan="3">&nbsp;</th>
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
                        ajax: "{{ url('process-list') }}",
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'tarja_proceso', name: 'tarja_proceso' },
                            { data: 'available', name: 'available' },
                            { data: 'created_at', name: 'created_at ' },
                        ]
                    });
                });
            </script>
            </div>
        </div>
    </div>
</div>
@endsection
