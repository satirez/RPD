@extends('layouts.dashboard')

@section('section')

<table class="table table-bordered responsive">
                    <thead>
                        <tr class="">
                            <th></th>
                            <th>Tarja</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <script>
                        var receptionArray = [];
                        </script>
                        @forelse($rejecteds as $rejected)
                        <tr>
                            <td>{{ Form::checkbox('rejecteds[]', $rejected->id, null, ['value'=>'$rejected->id']) }}
                            </td>
                            <td>SP00{{ $rejected->id }}</td>
                            <script>

                            //Mostrar los 'Lotes' (availables) y mostrar 'SubProcesses' (availables) para
                            //enviarlos al coontrolador
                            //updatearlos Boool


                            </script>
                            @php
                            $uno = false;
                            @endphp
                        </tr>

                        @empty
                        <h4> Sin Registros </h4>
                        @php
                        $uno = true;
                        @endphp
                        @endforelse
                    </tbody>
					<div class="float-left">
                   
                
                </table>
                @stop