@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Detalle de Lote:</h4>
                    <a class="btn btn-sm btn-danger pull-left " href="{{ Route ('lotes.index') }}"> Salir </a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        @foreach($subprocess as $subproces)
                        <table class="table table-hover">

                            <tbody>

                                <tr class="table-dark text-dark">
                                    <th> Tarjas </th>
                                    <th> SP0{{ $subproces->id }}</th>
                                    <th> SP0{{ $subproces->fruit->specie }}</th>
                                    <th> SP0{{ $subproces->varieties->variety }}</th>
                                    <th> SP0{{ $subproces->quality->name }}</th>
                                </tr>

                               
                               
                              
                              


                                <br>
                            </tbody>

                        </table>
                        @endforeach
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
<!-- /.col-lg-6 -->
@stop