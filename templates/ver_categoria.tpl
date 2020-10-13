    {include 'header.tpl'}
        
    {include 'carrusel.tpl'}
    
    {if !empty($categoria)}
        {* si hay detalles de la categoria *}
        {foreach from=$categoria item=cat}
            <h1>{$cat->nombre}</h1>
            <p>{$cat->descripcion}</p>
        {/foreach}
    {else}
        <p>No hay ningun detalle de categoria para mostrar.</p>
    {/if}
    <h3>Habitaciones con dicha categoria</h3>
    {if !empty($habitaciones)}
        {* si hay habitaciones para la categoria *}
        <ul class="list-group mt-5">
            {foreach from=$habitaciones item=hab}
                <li class="list-group-item">
                    <a href="mostrar_habitacion/{$hab->id}">Habitacion N {$hab->nro} - {$hab->ubicacion}</a>
                </li>
            {/foreach}
        </ul> 
    {else}
        <p>No hay habitaciones que tengan asociada esta categoria</p>
    {/if}
        
    </main>
    {include file='footer.tpl'}
