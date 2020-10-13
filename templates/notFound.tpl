    {include 'header.tpl'}
      
    {include 'carrusel.tpl'}
        
    <h3>Importante!!</h3>
    {if !empty($mensaje)}
        <div class="alert alert-dismissible alert-warning">
            <h4 class="alert-heading">Importante!</h4>
            <p>{$mensaje}</p>
        </div>     
    {/if} 
    
    {if !empty($camino)}
        <a href="{$camino}">volver atras</a>
    {/if}
    </main>
    {include file='footer.tpl'}