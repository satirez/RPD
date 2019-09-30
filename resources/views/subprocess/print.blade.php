
<div class="col-md-12">
    <h1>TARJA DE PRODUCTO CREADO: </h1>

<div class="table-responsive">
    <table  class=" cell-border order-column">

        
           <thead>

            <tr>
                <td><p> NUMERO DE TARJA ..............................</p></td>
                <td><strong>Nº {{ $subprocess->tarja}}</strong></td> 
            </tr>

            <tr>
                <td><p>FECHA DE GUIA    .....................................</p></td>
                <td><strong>___/___/___</strong></td> 
            </tr>

            <tr>
                <td><p>PROVEEDOR        ............................................ </p></td>
                 <td><strong>   {{ $subprocess->provider->name}} </strong></td> 
            </tr>

            <tr>
                <td><p>CALIDAD  .................................................</p></td> 
                  <td><strong>  {{ $subprocess->quality->name}} </strong></td> 
            </tr>

            <tr>
                <td><p>ESTATUS      ................................................ </p></td>
                 <td><strong>   {{ $subprocess->status->name }}</strong></td> 
            </tr>

            <tr>
                <td><p>ESPECIE    .................................................... </p></td>
                  <td><strong>  {{ $subprocess->fruit->specie}}</strong></td> 

            </tr>

            <tr>
                <td><p>VARIEDAD  .............................................. </p></td>
                <td><strong>    {{ $subprocess->varieties->variety}} </strong></td> 
            </tr>
            <tr>
                <td><p>EMBALAJE     ............................................</p></td>
                <td><strong> {{ $subprocess->supplies->name }}</strong></td> 
            </tr>
             <tr>
                <td><p>PESO NETO    ..............................................</p></td>
                 <td><strong>   {{ $subprocess->grossweight}} Kg.</strong></td> 
            </tr>
            <tr>
                <td><p>CANTIDAD DE CAJAS .............................</p></td>
                  <td><strong>  {{ $subprocess->quantity }} </strong></td>
            </tr>

           
            
          
              
           </thead>

      


        
            
    </table>
    </div>
</div>

