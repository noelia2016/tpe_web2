    {include 'head.tpl'}
      
    {include 'carrusel.tpl'}
        
    <h3 class="m-3">Notificacion de error!!</h3>
    {if !empty($mensaje)}
        <div class="alert alert-danger m-3">
            <h4 class="alert-heading">Importante!</h4>
            <p>{$mensaje}</p>
        </div>     
    {/if} 
    {if !empty($camino)}
        <a class="btn btn-secondary m-3" href="{$camino}">volver atras</a>
    {/if}
 
    </main>
    {include file='footer.tpl'}