    {include 'admin.header.tpl'}
        
    <h2>Listado de Usuarios</h2>
    {if (!empty($mensaje) && isset($mensaje))}
        <div class="alert alert-dismissible alert-warning">
            <h4 class="alert-heading">Datos erróneos</h4>
            <p>{$mensaje}</p>
        </div>
    {/if}
    {if (!empty($mensajeBien) && isset($mensajeBien))}
        <div class="alert alert-dismissible alert-success" role="alert">
            <h4 class="alert-heading">Datos actualizados</h4>
            <p>{$mensajeBien}</p>
        </div>
    {/if}
    {if !empty($usuarios)}
         <div class="table-responsive">
             <table class="table mt-3 text-left" id="tablaHabitaciones">
                 <thead>
                     <tr>
                         <th>Apellido, Nombre</th>
                         <th>Email</th>
                         <th>Usuario</th>
                         <th>Tipo</th>
                         <th>Estado</th>
                         <th>Operaciones</th>
                     </tr>
                 </thead>
                 <tbody id="tabla-Body">
                     {foreach from=$usuarios item=users}
                        {* muestro todos menos el logueado *}
                        {if ($smarty.session.ID_USER != $users->id)}
                             <tr>
                                 <td>
                                     {$users->apellido}, {$users->nombre}
                                 </td>
                                 <td>
                                     {$users->email}
                                 </td>
                                 <td>
                                     {$users->user}
                                 </td>
                                    {if ($users->es_administrador == 1) }
                                        <td>Administrador</td>
                                    {else}
                                        <td>Usuario</td>
                                    {/if}
                                    {if ($users->habilitado == 1) }
                                        <td>Habilitado</td>
                                     {else}
                                        <td>Deshabilitado</td>
                                     {/if}
                                <td>
                                     <a class='btn btn-danger btn-sm' href='eliminar_usuario/{$users->id}'>Eliminar</a> 
                                     <a class='btn btn-info btn-sm' href='editar_usuario/{$users->id}'>Editar</a>
                                 </td>
                             </tr>
                          {/if}
                     {/foreach}
                 </tbody>
             </table>
             <nav aria-label="Page navigation example">
             <ul class="pagination justify-content-center">
                {if ($pagina_act != 1)} 
                    <li class="pag-item">
                        <a class="page-link fondo_oscuro" href="listar_usuarpag/{$pagina_act-1}">
                        <span aria-hidden="true">&laquo;</span>
                        </a>
                {/if}
                {foreach $tot_paginas as $pag}
                    {if ($pag == $pagina_act)}
                        <li class="pag-item">
                            <a class="page-link fondo_oscuro page-link-actual" href="listar_usuarpag/{$pag}">{$pag}
                            </a>
                        </li>   
                    {else}
                        <li class="pag-item">
                            <a class="page-link fondo_oscuro" href="listar_usuarpag/{$pag}">{$pag}
                            </a>
                        </li>       
                    {/if}  
                {/foreach}
                {if ($pagina_act != $tot_paginas)}
                    <li class="pag-item">
                        <a class="page-link fondo_oscuro" href="listar_usuarpag/{$pagina_act+1}">
                        <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                {/if}
                                 
             </ul>
         </nav>
         </div>
    {else}
        {* en caso que no se dispongan de datos a mostrar notifico *}
        <div class="alert alert-dismissible alert-warning">
            <h4 class="alert-heading">Importante!</h4>
            <p>No hay usuarios registrados.</p>
        </div>    
    {/if}  
    </main>
    {include file='footer.tpl'}
