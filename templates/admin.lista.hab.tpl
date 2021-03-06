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
             <div class="btn-group m-3">
                 <a class='btn btn-success btn-sm' href='insertar_hab'>Nueva habitación</a>
             </div>
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
       
            </div>
         
        </div>

 </section>
 </main>
 {include file='footer.tpl'}