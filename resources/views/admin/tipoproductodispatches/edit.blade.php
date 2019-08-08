@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-md-offset-2">       
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4 style="text-align:center;">Editar Tipo de Producto a Despachar</h4>
                        </div>
                @include('admin.tipoproductodispatches.partials.errors')
                <div class="panel-body">
                	{!! Form::model($tipoproductodispatch, ['route' => ['admin.tipoproductodispatches.update', $tipoproductodispatch->id],
                	'method' => 'PUT']) !!} 

                	@include('admin.tipoproductodispatches.partials.form')

                	{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@stop