
<div class="col-md-12">
    <h1> Recepcion {{ $receptions->tarja}}  </h1>

<div class="table-responsive">
    <table  class=" cell-border order-column">
        <thead>
            <tr>
                <td><strong>Tarja  .................................................................................................................................</strong></td>
                <td><strong> {{ $receptions->tarja}}</strong></td>
            </tr>

            <tr>
                <td><strong>Peso Neto .........................................................................................................................</strong></td>
                <td><strong> {{ $receptions->grossweight}}</strong></td>
            </tr>

            <tr>
                <td><strong>Provedor ...........................................................................................................................</strong></td>
                <td><strong> {{ $receptions->provider->name}}</strong></td>
            </tr>

            <tr>
                <td><strong>Fruta .................................................................................................................................</strong></td>
                <td><strong> {{ $receptions->fruit->specie}}</strong></td>
            </tr>

            <tr>
                <td><strong>Temporada .......................................................................................................................</strong></td>
                <td><strong> {{ $receptions->season->name}}</strong></td>
            </tr>

            <tr>
                <td><strong>Estatus  ..............................................................................................................................</strong></td>
                <td><strong> {{ $receptions->supplies->name }}</strong></td>
            </tr>

            <tr>
                <td><strong>Cantidad ...........................................................................................................................</strong></td>
                <td><strong> {{ $receptions->quantity }}</strong></td>
            </tr>

            <tr>
                <td><strong>Peso Palet .........................................................................................................................</strong></td>
                <td><strong> {{ $receptions->palet_weight }}</strong></td>
            </tr>

        </thead>

    </table>
    </div>
</div>

