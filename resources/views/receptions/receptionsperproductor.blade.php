@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">       
                    <div class="panel panel-primary">
                <div class="panel-heading">
                            <h4 style="text-align:center;">Recepcionados en proceso
                    @can('inprocess.create')
                    <a href="{{ Route('receptions.create') }}" class="btn btn-sm btn-primary pull-right"> Crear </a>
                    @endcan

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            {{ Form::label('provider_id', 'Selecciona un proveedor') }}
                            {{Form::select('provider_id', $listProviders, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
                        </div>
                    </div>
                       

                    </div>
                </div>


               

               <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">
                             
                               <th>Peso bruto</th>
                               <th>Peso neto</th>

                           </tr>
                       </thead>
                       <tbody>
                        @foreach($inprocess as $inprocesslis)
                           <tr>
                                <td>{{ $inprocesslis->grossweight  }} Kg.</td>
                                <td>{{ $inprocesslis->netweight  }} Kg.</td>
                           </tr>
                        @endforeach
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
 