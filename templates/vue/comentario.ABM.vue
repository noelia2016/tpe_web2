{literal}
<section id="app">
    <div class="table-responsive">
         <table class="table mt-3 text-left">
             <thead>
                 <tr>
                     <th>Comentario</th>
                     <th>Acciones</th>
                 </tr>
             </thead>
             <tbody>
                <tr v-if="!comentarios.length">No hay ningun comentario.</td>
                <tr class="item" v-for="comentario in comentarios"> 
                    <td>                
                        <div class="list-group">
                            <div class="d-flex w-100 justify-content-between">
                               <h5 class="mb-1">{{ comentario.user }} </h5>
                               <small>Para la habitacion Nº {{ comentario.nro_hab }} - {{ comentario.fecha_realizado }}</small>
                            </div>
                            <p class="mb-1">{{ comentario.mensaje }} </p>
                            <p class="mb-1">Puntos: {{ comentario.puntuacion }} </p>
                        </div>
                    </td>
                    <td>
                        <a class='btn btn-danger btn-sm' href='eliminar_cat/{{$comentario->id}}'>Eliminar</a>
                    </td>
                </tr>
             </tbody>
          </table>
    </div>
</section>
{/literal}
