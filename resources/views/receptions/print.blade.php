
<div class="col-md-12">
    <h1> Recepcion {{ $receptions->tarja}}  </h1>

<div class="table-responsive">
    <table  class=" cell-border order-column">
        
           
                <h3>Tarja  ........................................................ {{ $receptions->tarja}}</h3>
                <h3>Peso Neto ................................................. {{ $receptions->grossweight}} Kg.</h3>
                <h3>Provedor .................................................. {{ $receptions->provider->name}} </h3>
                <h3>Fruta ....................................................... {{ $receptions->fruit->specie}}</h3>
                <h3>Temporada ............................................ {{ $receptions->season->name}}</h3>
                <h3>Estatus  .................................................. {{ $receptions->supplies->name }}</h3>
                <h3>Cantidad .................................................. {{ $receptions->quantity }} Kg.</h3>
                <h3>Peso Palet ................................................ {{ $receptions->palet_weight }} Kg.</h3>
              
           
        

    </table>
    </div>
</div>

