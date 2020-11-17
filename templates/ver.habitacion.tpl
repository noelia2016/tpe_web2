    {include 'header.tpl'}
      
    {include 'carrusel.tpl'}
        
    <h3>Habitación</h3>
    {if !empty($habitacion)}
        <ul class="list-group mt-5">
            <li class="list-group-item">
                Habitación N° {$habitacion->nro} - {$habitacion->ubicacion}
            </li>
            <li class="list-group-item">
                Categoria: {$habitacion->nombre_cat} 
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
    {* agregarlo solo si es usuario registrado *}
    {if (isset($mostrar) && (!$mostrar))}
        <div class="alert alert-info" role="alert">
            <span>Tu opinion nos interesa!!</span>
            <p>Si queres comentar como fue tu estadia y todavia sos usuario. Por favor registrate <a href="registrar">aqui</a></p>   
        </div>
    {else}
        {include 'form.comentario.tpl'}
    {/if}   
    {* mostrar todos los comentarios de la habitacion *}
    
    {include 'listar.comentarios.tpl'}
    
    {* fin de mostrar los comentarios de la habitacion *}
    </main>
    {include file='footer.tpl'}
