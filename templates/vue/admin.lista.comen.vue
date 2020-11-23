{literal}
<section id="app" class="list-group mt-3">
    <div class="table-responsive">
        <table class="table mt-3 text-left" id="tablaComentarios">
             <thead>
                <tr>
                     <th>Fecha</th>
                     <th>Habitación</th>
                     <th>Usuario</th>
                     <th>Puntuación</th>
                     <th>Comentario</th>
                </tr>
             </thead>
            <tbody id="tabla-Body">
                <tr v-for="comentario in comentarios">             
                    <td>{{ comentario.fecha_realizado }} </td>
                    <td>{{ comentario.nro_hab }}</td> 
                    <td>{{ comentario.user }}</td>
                    <td>{{ comentario.puntuacion }} </td>
                    <td>{{ comentario.mensaje }}</td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='eliminarComentario/{{$comentario.id}}'>Eliminar</a> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
{/literal}