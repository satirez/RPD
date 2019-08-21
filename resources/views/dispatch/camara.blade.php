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
                               <th>Numero de lote</th>
                               <th>Creado</th>
                               
                               <th colspan="3">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($lotes as $lote)
                           <tr>
                                <td>{{ $lote->id }}</td>
                                <td>{{ $lote->numero_lote  }}</td>
                                <td>{{ $lote->created_at  }}</td>
                               

                                
                           
                                 

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $lotes->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
