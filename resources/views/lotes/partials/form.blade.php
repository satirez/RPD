@extends('layouts.dashboard')

@section('section')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 style="text-align:center;">Ingresar Nuevo Lote a camara:</h4>
				</div>

				@include('lotes.partials.errors')
				<div class="panel-body">

					<br>
					<div class="card">
						<div class="card-header">
							<div class="badge badge-pill badge-warning float-left"> 1 </div>
							<h6>Selección:</h6>
						</div>

						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<h3 class="text-center">Listado de productos en camara</h3>
									<div class="form-group">


										<div class="row">
											<form method="POST" action="{{ route('lote.createrial') }}">
												@csrf

												<div class="col-md-12">
													<div class="row">
														<div class="col-md-4">
															<div class="form-group">
																<label for="fruit_id">Fruta</label>
																<select class="form-control" name="fruit_id" id="fruit_id">
																	<option value=""> Fruta </option>
																	@foreach ($fruits as $fruit)
																	<option value="{{ $fruit->id }}"> {{ $fruit->specie }}</option>
																	@endforeach
																</select>
															</div>
														</div>
														<div class="col-md-4">
															<div class="form-group">
																<label for="variety_id">Variedad</label>
																<select class="form-control" name="variety_id" id="variety_id" required>
																	<option value=""> Variedad de Fruta </option>
																</select>
															</div>
														</div>


														<div class="col-md-4">
															<div class="form-group">
																{{ Form::label('quality_id', 'Calidad') }}
																{{Form::select('quality_id', $qualities, null, ['class' => 'form-control','required', 'placeholder'=>'Seleccione una opción'])}}
															</div>
														</div>

														<div class="col-md-4">
															<div class="form-group">
																{{ Form::label('Producto', '') }}
																{{ Form::select('Producto', array( 'RP' => 'Producto Reprocesado', 'PT' => 'Producto Terminado'), 
							null ,['class' => 'form-control','required' ,'placeholder'=>'seleccione ...'])}}
															</div>
														</div>


														<div class="col-md-6 mt-4">

															<div class="form-group">
																<button type="submit" class="btn btn-primary">
																	<span class="fas fa-search"></span> Buscar
																</button>
															</div>

														</div>
													</div>
												</div>
											</form>
										</div>

									</div>

									<br>
									<br>


								</div>



							</div>
						</div>
					</div>




					<script type="text/javascript">
						$(document).ready(function (){
						$('.input-number').keyup(function (){
							this.value = (this.value + '').replace(/[^.x0-9]/g, '');
						});
						});
					
					
					
						$(function(){
							$('#fruit_id').on('change', onSelectProyectChange);
						});
					
						function onSelectProyectChange(){
							var fruit_id = $(this).val();
							
							if(! fruit_id){
								$('#variety_id').html('<Option value="">Seleccione Variedad</Option>');
									return;
							}
							// ajax
					
							$.get('/api/fruit/'+fruit_id+'/variedad', function(data){
					
								var html_select = '<Option value="">Seleccione Variedad</Option>';
								for(var i=0; i<data.length; ++i)
									html_select += '<Option value="'+data[i].id+'">'+data[i].variety+'</option>';
								$('#variety_id').html(html_select);
							});
						}
					
					
					</script>

				</div>
			</div>
		</div>
	</div>
</div>
@stop