@extends('layouts.dashboard')

@section('section')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css"
    integrity="sha256-b5ZKCi55IX+24Jqn638cP/q3Nb2nlx+MH/vMMqrId6k=" crossorigin="anonymous" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"
    integrity="sha256-5YmaxAwMjIpMrVlK84Y/+NjCpKnFYa8bWWBbUHSBGfU=" crossorigin="anonymous"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 style="text-align:center;"> Fruta Procesada

                </div>


                <form method="POST" action="{{ route('reporteProcesoFruitSearch') }}">
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



                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="">

                                <th>Kilos Procesados</th>
                                <th>Kilos de P. Final</th>
                                <th>Fruta - variedad</th>


                                <th colspan="auto">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($processes as $processe)
                            <tr>
                                <td>{{ $processe->grossweight  }} Kg.</td>
                                <td>{{ $processe->netweight  }} Kg.</td>
                                <td>{{ $processe->fruit->specie  }} - {{$processe->varieties->variety}} </td>

                            </tr>
                            @empty
                            <h1 class="alert alert-danger text-center"> No hay reporte </h1>
                            @endforelse

                        </tbody>
                    </table>
                    <table class="table responsive">
                        <h3> Total </h3>
                        <tr style="font-size:24px">
                            <td> Bruto: {{ $processes->sum('grossweight') }} </td>
                            <td> Neto: {{ $processes->sum('netweight') }} </td>
                        </tr>
                    </table>
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
</div>
</div>
</div>
@endsection