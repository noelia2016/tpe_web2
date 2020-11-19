{literal}
<section id="app">
    <ul class="list-group mt-5">
        <li v-if="!comentarios.length">No hay ningun comentario.</li>
        <li v-for="comentario in comentarios" class="list-group-item d-flex justify-content-between">             
            {{ comentario.usuario }} - {{ comentario.mensaje }} - {{ comentario.fecha_realizado }} 
        </li>
    </ul>
</section>
{/literal}