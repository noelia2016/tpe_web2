    {include 'header.tpl'}
    <main class="container"> <!-- inicio del contenido principal -->
        
        {include 'carrusel.tpl'}
        
        <h3>Habitacion</h3>
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
        
    </main>
    {include file='footer.tpl'}
