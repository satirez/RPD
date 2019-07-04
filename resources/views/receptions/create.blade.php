@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Crear Recepcion
                        </div>

                <div class="panel-body">
                    {!! Form::open(['route' => 'receptions.store']) !!} 

                    @include('receptions.partials.form')

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

    

  


    <!-- Tabla -->
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 ">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;"> Recepcion
                  

                </div>

                 <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                             
                               <th>Peso bruto</th>
                               <th>Peso neto</th>

                               <th>Proveedores</th>
                               <th>Fruta</th>
                               <th>Calidad</th>
                               
                               <th>Nombre del chofer</th>
                               <th>N de guia</th>
                               <th>N de tarja</th>
                               <th>creado</th>

                               <th colspan="auto">&nbsp;</th>
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($receptionslist as $receptionslis)
                           <tr>
                                <td>{{ $receptionslis->grossweight  }}</td>
                                <td>{{ $receptionslis->netweight  }}</td>
                                <td>{{ $receptionslis->provider->name  }}</td>
                                <td>{{ $receptionslis->fruit->name  }}</td>
                                <td>{{ $receptionslis->quality->name  }}</td>
                                <td>{{ $receptionslis->name_driver  }}</td>
                                <td>{{ $receptionslis->number_guide }}</td>
                                <td>{{ $receptionslis->tarja }}</td>
                                <td>{{ $receptionslis->created_at }}</td>
                                

    
                                <td width="8px">
                                    @can('receptions.show')
                                    <a href="{{ Route('receptions.show', $receptionslis->id) }}" class="btn btn-sm btn-default">Ver</a>
                                    @endcan
                                <td>
                                

                           </tr>
                        @endforeach
                       </tbody>
                   </table>
                   {{ $receptionslist->render() }}

                </div>
            </div>
        </div>
    </div>
    
  </div>



  

@endsection
