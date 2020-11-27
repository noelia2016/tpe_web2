    {include 'header.tpl'}

    {if ($mostrarCarrusel == TRUE)}
        {include 'carrusel.tpl'}
    {else}
        {include 'carrusel.de.habitacion.tpl'}
    {/if}

    <div class="col mt-3 mb-1">
        <h3>Detalles de la Habitación</h3>
        {if !empty($habitacion)}
            <ul class="list-group mt-5">
                <li class="list-group-item">
                    N° {$habitacion->nro} - {$habitacion->ubicacion}
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
                <p>No hay detalles específicos para la habitación elegida.</p>
            </div>
        {/if}
    </div>
    <div class="col mt-3 mb-1">
        {* agregarlo solo si es usuario registrado *}
        {if (isset($mostrar) && (!$mostrar))}
            <div class="alert alert-info" role="alert">
                <span>Tu opinión nos interesa!!</span>
                <p>Si queres comentar como fue tu estadia y todavía no sos usuario. Por favor registrate
                    <a href="registrar" id="link-registrar">aquí
                    </a>
                </p>
            </div>
        {else}
            {include 'form.comentario.tpl'}
        {/if}
        {* mostrar todos los comentarios de la habitacion *}

        {* va a mostrar los comentarios para dicha habitacion*}
        <div class="col mt-3 mb-1">
            {include file="vue/comentarioList.vue"}
        </div>
    </div>
    {* fin de mostrar los comentarios de la habitacion *}
    </main>

    <!-- incluyo JS para CSR -->
    <script src="js/comentarios.js"></script>
    {include file='footer.tpl'}