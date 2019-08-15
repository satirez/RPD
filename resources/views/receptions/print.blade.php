@extends('layouts.dashboard')
@section('section')

<a href="{{ url('/prnpriview') }}" class="btnprn btn">Print Preview</a></center>

    <script type="text/javascript">
        $(document).ready(function(){
    $('.btnprn').printPage();
    });
    </script>

<div class="col-md-12">
    <h1> Tarja </h1>
    <table class="table table-responsive">
        <thead>
            <tr>
                <td>Tarja</td>
                <td>Peso Bruto</td>
                <td>Tarja</td>
                <td>Tarja</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> {{ $receptions->tarja}}</td>
                <td> {{ $receptions->grossweight}}</td>
                <td> {{ $receptions->tarja}}</td>
                <td> {{ $receptions->tarja}}</td>
            </tr>
        </tbody>

    </table>
</div>

@endsection