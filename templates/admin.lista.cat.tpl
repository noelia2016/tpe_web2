 {include 'admin.header.tpl'}
 <section class="container-fluid fondo_container">
     <div class="row">
         <div class="col-12">
             <h2>Categorias de habitaciones</h2>
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
                 <a class='btn btn-success btn-sm' href='insertar_cat'>Nueva categoria</a>
             </div>
             <div class="table-responsive">
                 <table class="table mt-3 text-left" id="tablaCategorias">
                     <thead>
                         <tr>
                             <th>Nombre</th>
                             <th>Descripción</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody id="tabla-Body-categorias">
                         {foreach from=$categorias item=cat}
                             <tr>
                                 <td>
                                     {$cat->nombre}
                                 </td>
                                 <td>
                                     {$cat->descripcion}
                                 </td>
                                 <td>
                                     <a class='btn btn-danger btn-sm' href='eliminar_cat/{$cat->id}'>Eliminar
                                     </a>
                                     <a class='btn btn-info btn-sm' href='editar_cat/{$cat->id}'>Editar
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