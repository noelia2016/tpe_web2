    {include 'header.tpl'}
        
    {include 'carrusel.tpl'}
        
        <h1>NUESTRAS HABITACIONES</h1>
        <p>En nuestro hotel todas las habitaciones cuentan con Caja Fuerte, Placard, Ropa Blanca, calefacción por Losa Radiante, TV por cable y Aire acondicionado (Excepto las estándar).</p>

        <span>CONOCELAS SEGÚN SU CATEGORIA…</span>
        
        
        <ul class="list-group mt-5">
        {foreach from=$categorias item=cat}
            <li class="list-group-item" id="link-nombre-cat">
                <a href="mostrar_categoria/{$cat->id}">{$cat->nombre}</a>
            </li>
        {/foreach}
        </ul> 
        <br/>
    
</main>      
    {include file='footer.tpl'}
