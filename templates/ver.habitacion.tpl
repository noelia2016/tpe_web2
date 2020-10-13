    {include 'header.tpl'}
      
    {include 'carrusel.tpl'}
        
    <h3>Habitacion</h3>
    {if !empty($habitacion)}
        <ul class="list-group mt-5">
            <li class="list-group-item">
                Habitacion N {$habitacion->nro} - {$hab->ubicacion}
            </li>
            <li class="list-group-item">
                Comodidades: {$habitacion->comodidades} 
            </li>
            <li class="list-group-item">
                Capacidad: {$habitacion->capacidad} 
            </li>
            <li class="list-group-item">
                Estado: {$habitacion->estado} 
            </li>
        </ul> 
    {else}
        {* en caso que no se dispongan de datos a mostrar notifico *}
        <div class="alert alert-dismissible alert-warning">
            <h4 class="alert-heading">Importante!</h4>
            <p>No hay detalles especificos para la habitacion elegida.</p>
        </div>    
    {/if}  
    </main>
    {include file='footer.tpl'}
