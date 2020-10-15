    {include 'admin.header.tpl'}
        
    <h3>Listado de Usuarios</h3>
    {if isset($mensaje) && !empty($mensaje)}
        <div class="alert alert-dismissible alert-info">
          <strong>{$mensaje}</strong>
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
                                 
                                     {if ($users->habilitado == 0) }
                                        <td>habilitado</td>
                                     {else}
                                        <td>deshabilitado</td>
                                     {/if}
                                 </td>
                                 <td>
                                     <a class='btn btn-danger btn-sm' href='eliminar_usuario/{$users->id}'>Eliminar</a> 
                                     <!--a class='btn btn-info btn-sm' href='deshabilitar_usuario/{$users->id}'>Des/habilitar</a-->
                                 </td>
                             </tr>
                          {/if}
                     {/foreach}
                 </tbody>
             </table>
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
