    {include 'header.tpl'}
      
    {include 'carrusel.tpl'}
        
    <h3>Habitacion</h3>
    {if !empty($habitacion)}
        <ul class="list-group mt-5">
        {foreach from=$habitacion item=hab}
            <li class="list-group-item">
                Habitacion N {$hab->nro} - {$hab->ubicacion}
            </li>
            <li class="list-group-item">
                Comodidades: {$hab->comodidades} 
            </li>
            <li class="list-group-item">
                Capacidad: {$hab->capacidad} 
            </li>
            <li class="list-group-item">
                Estado: {$hab->estado} 
            </li>
        {/foreach}
        </ul> 
    {else}
        <p>No detalles especificos para la habitacion elegida.</p>
    {/if}  
    </main>
    {include file='footer.tpl'}
