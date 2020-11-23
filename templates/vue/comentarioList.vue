{literal}
<section id="app" class="list-group mt-3">
    <ul v-if="comentarios.length > 0" class="list-group mt-3">
        <li v-for="comentario in comentarios" class="list-group-item d-flex justify-content-between">             
            <div class="list-group">
                <div class="d-flex w-100 justify-content-between">
                   <h5 class="mb-1">{{ comentario.user }} </h5>
                   <small>Para la habitacion Nº {{ comentario.nro_hab }} - {{ comentario.fecha_realizado }}</small>
                </div>
                <p class="mb-1">{{ comentario.mensaje }} </p>
                <p class="mb-1">Puntos: {{ comentario.puntuacion }} </p>
            </div>
        </li>
    </ul>
    <p v-else>No hay comentarios!</p>
</section>
{/literal}
