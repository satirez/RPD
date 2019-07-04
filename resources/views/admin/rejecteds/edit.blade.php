@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Motivo de rechazo</h4>
                        </div>
                @include('admin.rejecteds.partials.errors')
                <div class="panel-body">
                	{!! Form::model($rejected, ['route' => ['admin.rejecteds.update', $rejected->id],
                	'method' => 'PUT']) !!} 

                	@include('admin.rejecteds.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop