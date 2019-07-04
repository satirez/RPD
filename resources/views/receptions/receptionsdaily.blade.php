@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12">       
        <div class="panel panel-primary">
                <div class="panel-heading">
                            <h4 style="text-align:center;">Receptiones del día
                 
                </div>

               <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                                
                               <th>Nombre Productor</th>
                               <th>Suma de Peso Bruto</th>
                               <th>Suma de Peso Neto</th>
                               
                           </tr>
                       </thead>
                       <tbody>
                        @foreach($inprocess as $inprocesslist)
                           <tr>
                                <td>{{ $inprocesslist->provider->name  }}</td>
                                <td>{{ $inprocesslist->grossweight  }} </td>
                                <td>{{ $inprocesslist->netweight  }}</td>
                           </tr>
                        @endforeach
                        <tr>
                            <td style="font-size:24px;" class="span"> <strong>Total de recepciones: {{ $cuenta }}</strong> </td>
                            <td style="font-size:24px;"> <strong> {{ $pesobruto  }} </strong></td>
                            <td style="font-size:24px;"> <strong> {{ $pesoneto }} </strong> </td> 
                        </tr>
                       </tbody>
                   </table>
                   {{ $inprocess->render() }}

                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
@endsection
 