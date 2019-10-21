
<div class="col-md-12">
    <h1>TARJA DE PRODUCTO CREADO: </h1>

<div class="table-responsive">
    <table  class=" cell-border order-column">

        
           <thead>

            <tr>
                <td><p> NUMERO DE TARJA ..............................</p></td>
                <td><strong>Nº {{ $subprocesses->id}}</strong></td> 
            </tr>

            <tr>
                <td><p>FECHA DE INGRESO    .............................</p></td>
                <td><strong>{{ $subprocesses->created_at}}</strong></td> 
            </tr>

            <tr>
                <td><p>PROVEEDOR        .......................................... </p></td>
                 <td><strong>   {{ $subprocesses->format->name}} </strong></td> 
            </tr>

            <tr>
                <td><p>CALIDAD  .................................................</p></td> 
                  <td><strong>  {{ $subprocesses->quality->name}} </strong></td> 
            </tr>


            <tr>
                <td><p>ESPECIE    .................................................... </p></td>
                  <td><strong>  {{ $subprocesses->fruit->specie}}</strong></td> 

            </tr>

            <tr>
                <td><p>VARIEDAD  .............................................. </p></td>
                <td><strong>    {{ $subprocesses->varieties->variety}} </strong></td> 
            </tr>
           
             <tr>
                <td><p>PESO .......................................................</p></td>
                 <td><strong>   {{ $subprocesses->weight}} Kg.</strong></td> 
            </tr>
            <tr>
                <td><p>CANTIDAD DE CAJAS .............................</p></td>
                  <td><strong>  {{ $subprocesses->quantity }} Cajas </strong></td>
            </tr>

           
            
          
              
           </thead>

      


        
            
    </table>
    </div>
</div>

