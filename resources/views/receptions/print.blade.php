
<div class="col-md-12">
    <h1>## RECEPCION {{ $receptions->tarja}}  ##</h1>

<div class="table-responsive">
    <table  class=" cell-border order-column">
        <thead>
            <tr>
           
                <td><h3>TARJA....................................</h3></td>
                <td><h3> {{ $receptions->tarja}}</h3></td>
                
            </tr>

            <tr>
                <td><h3>PESO NETO..........................</h3></td>
                <td><h3> {{ $receptions->grossweight}}</h3></td>
            </tr>

            <tr>
                <td><h3>PROVEEDOR.......................</h3></td>
                <td><h3> {{ $receptions->provider->name}}</h3></td>
            </tr>

            <tr>
                <td><h3>FRUTA...................................</h3></td>
                <td><h3> {{ $receptions->fruit->specie}}</h3></td>
            </tr>

            <tr>
                <td><h3>TEMPORADA........................</h3></td>
                <td><h3> {{ $receptions->season->name}}</h3></td>
            </tr>

            <tr>
                <td><h3>ESTATUS..............................</h3></td>
                <td><h3> {{ $receptions->supplies->name }}</h3></td>
            </tr>

            <tr>
                <td><h3>CANTIDAD...........................</h3></td>
                <td><h3> {{ $receptions->quantity }}</h3></td>
            </tr>

            <tr>
                <td><h3>PESO PALET...........................</h3></td>
                <td><h3> {{ $receptions->palet_weight }}</h3></td>
            </tr>

        </thead>

    </table>
    </div>
</div>

