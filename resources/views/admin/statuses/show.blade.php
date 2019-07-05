@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Estatus
                </div>

                <div class="panel-body">
                	<p><strong>Nombre</strong> {{ $status->name   }}</p>                  
                </div>
            </div>
        </div>
    </div>
</div>
@stop