 {include 'admin.header.tpl'}
 <section class="container-fluid fondo_container">
     <div class="row">
         <div class="col-12">
             <h2>Habitaciones</h2>
             {if !empty($mensaje)}
                 <div class="alert alert-dismissible alert-warning">
                     <h4 class="alert-heading">Datos erróneos</h4>
                     <p>{$mensaje}</p>
                 </div>
             {/if}
             {if !empty($mensajeBien)}
                 <div class="alert alert-dismissible alert-success" role="alert">
                     <h4 class="alert-heading">Datos actualizados</h4>
                     <p>{$mensajeBien}</p>
                 </div>
             {/if}
             <div class="table-responsive">
                 <table class="table mt-3 text-left" id="tablaHabitaciones">
                     <thead>
                         <tr>
                             <th>Número</th>
                             <th>Capacidad</th>
                             <th>Categoria</th>
                             <th>Estado actual</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody id="tabla-Body">
                         {foreach from=$habitaciones item=hab}
                             <tr>
                                 <td>
                                     {$hab->nro}
                                 </td>
                                 <td>
                                     {$hab->capacidad}
                                 </td>
                                 <td>
                                     {$hab->nombre_cat}
                                 </td>
                                 <td>
                                     {$hab->estado}
                                 </td>
                                 <td>
                                     <a class='btn btn-danger btn-sm' href='eliminar_hab/{$hab->id}'>Eliminar
                                     </a>
                                     <a class='btn btn-info btn-sm' href='editar_hab/{$hab->id}'>Editar
                                     </a>
                                 </td>
                             </tr>
                         {/foreach}
                     </tbody>
                 </table>
             </div>
             <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center">
                 <li class="page-item disabled">
                     <a class="page-link fondo_oscuro" href="#" tabindex="-1" aria-disabled="true">Anterior</a>
                 </li>
                 <li class="page-item"><a class="page-link fondo_oscuro" href="#">1</a></li>
                 <li class="page-item"><a class="page-link fondo_oscuro" href="#">2</a></li>
                 <li class="page-item"><a class="page-link fondo_oscuro" href="#">3</a></li>
                 <li class="page-item">
                     <a class="page-link fondo_oscuro" href="#">Siguiente</a>
                 </li>
             </ul>
         </nav>
            </div>
         
        </div>

     <div class="btn-group m-5">
         <a class='btn btn-success btn-sm' href='insertar_hab'>Nueva habitación</a>
     </div>

 </section>
 </main>
 {include file='footer.tpl'}