<!-- ADMINISTRADOR: formulario de edición de usuario -->
{include file= 'admin.header.tpl'}
<section class="container-fluid fondo_container">
    <h2>Editar datos de usuarios del sistema</h2>
    <form action="guardar_usu" method="POST" class="my-4">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    {if $usuario}
                        <input type="hidden" name="id_usuario" 
                        value={$usuario->id}>
                    {/if}

                    <label>Nombre:</label>
                    {if $usuario}     
                        <label class="form-control">{$usuario->nombre}</label> 
                    {/if}

                    <label>Email:</label>
                    {if $usuario}     
                        <label class="form-control">{$usuario->email}</label> 
                    {/if}

                    <label>Estado:</label>
                    <select name="habilitado" class="form-control">
                        {if $usuario}
                            {html_options values=$opc_habilitado output=$txt_habilitado selected=$usuario->habilitado}
                        {/if}
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    <label>Apellido:</label>
                        {if $usuario}     
                            <label class="form-control">{$usuario->apellido}</label> 
                        {/if}
                    <label>Nombre de usuario:</label>
                        {if $usuario}     
                            <label class="form-control">{$usuario->user}</label> 
                        {/if}
                                         
                    <label>Tipo:</label>
                    <select name="es_administrador" class="form-control">
                    {if $usuario}
                        {html_options values=$opc_tipo_usu output=$txt_tipo_usu selected=$usuario->es_administrador}
                    {/if}
                </select>
                                         
                </div>
            </div>
        </div>
        <div class="btn-group m-5">
            <input class='btn btn-info btn-sm' value="Guardar" type="submit">
        </div>
        <div class="btn-group m-5">
            <a class='btn btn-info btn-sm' href="{BASE_URL}listar_usuarios">Volver</a>
        </div>
    </form>
</section>
</main>
{include file='footer.tpl'}