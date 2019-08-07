@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-0">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Camara</h4>
                        
                    
                </div>

                 <div class="table-responsive">
                    <table class="table table-striped table-hover "> 
                       <thead>
                           <tr>
                               <th>Tarja</th>
                               <th>N° Cajas</th>
                               <th>Creado</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($subprocesses as $subprocess)
                           <tr>
                                <td>{{ $subprocess->tarja_proceso }}</td>
                                <td>{{ $subprocess->Box_out  }}</td>
                                <td>{{ $subprocess->created_at  }}</td>
                               

                                <td width="10px">
                                    @can('subprocess.subsubprocesses.show')
                                    <a href="{{ Route('subprocess.subsubprocesses.show', $subprocess->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                
                           
                                 

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $subprocesses->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
