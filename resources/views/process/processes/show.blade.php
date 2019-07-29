@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Detalle de Proceso</h4>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                              @foreach($subprocess as $subproces)
                                <table class="table table-hover">
                                   
                                    <tbody>
                                        <tr>
                                            <th> Tarjas </th>
                                            <th> PROC{{ $subproces->id }}</th>
                                        </tr>
                                     
                                        <tr>
                                            <th> Frutas </th>
                                        </tr>
                                        <tr>
                                            <th> Calidad </th>
                                        </tr>
                                        <tr>
                                            <th> Peso Neto </th>
                                        </tr>
                                        <tr>
                                            <th> Peso Bruto </th>
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
