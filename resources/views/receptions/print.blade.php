
<div class="col-md-12">
    <h1> Tarja </h1>
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
