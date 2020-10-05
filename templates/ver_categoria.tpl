    {include 'header.tpl'}
        
    {include 'carrusel.tpl'}
    
    
    {foreach from=$categoria item=cat}
        <h1>{$cat->nombre}</h1>
        <p>{$cat->descripcion}</p>
    {/foreach}

    <h3>Habitaciones con dicha categoria</h3>
    <ul class="list-group mt-5">
    {foreach from=$habitaciones item=hab}
        <li class="list-group-item">
            <a href="mostrar_habitacion/{$hab->id}">Habitacion N {$hab->nro} - {$hab->ubicacion}</a>
        </li>
    {/foreach}
    </ul> 

    {include file='footer.tpl'}
