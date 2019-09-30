
<div class="col-md-12">
    <h1>TARJA DE RECEPCIÓN: </h1>

<div class="table-responsive">
    <table  class=" cell-border order-column">

        
           <thead>

            <tr>
                <td><p> NUMERO DE TARJA ..............................</p></td>
                <td><strong>Nº {{ $receptions->tarja}}</strong></td> 
            </tr>

            <tr>
                <td><p>FECHA DE GUIA    .....................................</p></td>
                <td><strong>___/___/___</strong></td> 
            </tr>

            <tr>
                <td><p>PROVEEDOR        ............................................ </p></td>
                 <td><strong>   {{ $receptions->provider->name}} </strong></td> 
            </tr>

            <tr>
                <td><p>CALIDAD  .................................................</p></td> 
                  <td><strong>  {{ $receptions->quality->name}} </strong></td> 
            </tr>

            <tr>
                <td><p>ESTATUS      ................................................ </p></td>
                 <td><strong>   {{ $receptions->status->name }}</strong></td> 
            </tr>

            <tr>
                <td><p>ESPECIE    .................................................... </p></td>
                  <td><strong>  {{ $receptions->fruit->specie}}</strong></td> 

            </tr>

            <tr>
                <td><p>VARIEDAD  .............................................. </p></td>
                <td><strong>    {{ $receptions->varieties->variety}} </strong></td> 
            </tr>
            <tr>
                <td><p>EMBALAJE     ............................................</p></td>
                <td><strong> {{ $receptions->supplies->name }}</strong></td> 
            </tr>
             <tr>
                <td><p>PESO NETO    ..............................................</p></td>
                 <td><strong>   {{ $receptions->grossweight}} Kg.</strong></td> 
            </tr>
            <tr>
                <td><p>CANTIDAD DE CAJAS .............................</p></td>
                  <td><strong>  {{ $receptions->quantity }} </strong></td>
            </tr>

           
            
          
              
           </thead>

      


        
            
    </table>
    </div>
</div>

