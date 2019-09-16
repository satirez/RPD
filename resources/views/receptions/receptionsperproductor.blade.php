@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-md-offset-1 ">


            <div class="container">
                <h2>Recepciones</h2>


                <div class="form-group">
                    <label for="provider_id">Fruta</label>
                    <select class="form-control" name="provider_id" id="provedor">
                        <option value=""> Seleccionar Proveedor </option>
                        @foreach ($listProviders as $listProvider)
                        <option value="{{ $listProvider->id }}"> {{ $listProvider->name }}</option>
                        @endforeach
                    </select>
                </div>
               

                <table class="table table-bordered" id="laravel_datatable2">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Peso Bruto</th>
                            <th>Fruta</th>
                            <th>Bandejas</th>
                            <th>Temporada</th>
                            <th>Provedor</th>
                            <th>Created at</th>
                        </tr>
                    </thead>


                </table>
            </div>

            <script>
                $(function(){
                        $('#provedor').on('change', onSelectProyectChange);
                        
                        

                    });
                
                    function onSelectProyectChange(){
                        var provedor = $(this).val();

                        if(! provedor){
                            alert('No hay proovedores');
                        }
                
                
                            $('#laravel_datatable2').DataTable({
                                processing: true,
                                
                                ajax: "{{ url('receptionsearch')}}/"+provedor,
                                columns: [
                                         { data: 'id', name: 'id' },
                                         { data: 'tarja', name: 'tarja' },
                                         { data: 'grossweight', name: 'grossweight' },
                                         { data: 'fruit', name: 'fruit.specie' },
                                         { data: 'supplies', name: 'supplies.name' },
                                         { data: 'season', name: 'season.name' },
                                         { data: 'provider', name: 'provider.name' },
                                         { data: 'created_at', name: 'created_at' }
                                      ]
                             });
                        
                    }
                

                    
            </script>




        </div>
    </div>
</div>
@endsection