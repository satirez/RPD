<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title> TARJA - {{ $receptions->tarja }}</title>
</head>
<body>

<div class="col-md-12">
    <h1> Recepcion </h1>
    <table class="table table-responsive" style="width:100%">
        <thead>
            <tr>
                <td>Tarja</td>
                <td> {{ $receptions->tarja}}</td>
            </tr>

            <tr>
                <td>Peso Neto</td>
                <td> {{ $receptions->grossweight}}</td>
            </tr>

            <tr>
                <td>Provedor</td>
                <td> {{ $receptions->provider->name}}</td>
            </tr>

            <tr>
                <td>Fruta</td>
                <td> {{ $receptions->fruit->specie}}</td>
            </tr>

            <tr>
                <td>Temporada</td>
                <td> {{ $receptions->season->name}}</td>
            </tr>

            <tr>
                <td>Estatus</td>
                <td> {{ $receptions->supplies->name }}</td>
            </tr>

            <tr>
                <td>Cantidad</td>
                <td> {{ $receptions->quantity }}</td>
            </tr>

            <tr>
                <td>Peso Palet</td>
                <td> {{ $receptions->palet_weight }}</td>
            </tr>

        </thead>

    </table>
</div>

</body>
</html>