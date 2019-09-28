@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;">Detalle de Pallet: </h4>
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
                                    <th> SP0{{ $subproces->sub_process_id }}</th>
                                </tr>
                                <tr>
                                    <th> Formato </th>
                                    <th> Formato </th>
                                </tr>
                                <tr>
                                    <th> Fruta </th>
                                    <th> Fruta </th>
                                </tr>
                                <tr>
                                    <th> Calidad </th>
                                    <th> Calidad </th>
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