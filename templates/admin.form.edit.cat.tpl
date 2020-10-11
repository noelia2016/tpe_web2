<!-- ADMINISTRADOR: formulario de edición categoria de habitación en el hotel -->
{include file= 'admin.header.tpl'}
<section class="container-fluid fondo_container">
<h2>Editar datos de categoria</h2>
    <form action="guardar_cat" method="POST" class="my-4">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                {if $categoria}
                    <input type="hidden" name = "id_categoria" value={$categoria->id}>
                {/if}
                    <label>Nombre</label>
                    <input name="nombre" type="text" class="form-control"> 
                    {if $categoria} 
                        value={$categoria->nombre}
                    {else}
                        value = ' '
                    {/if}
                    >
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="5"></textarea>
                    {if $categoria} 
                        value={$categoria->descripcion}
                    {else}
                        value = ' '
                    {/if}
                    >
                </div>
            </div>
        </div>
        <div class="btn-group m-5">
            <input class='btn btn-info btn-sm' value="Guardar" type="submit">
        </div>
        <div class="btn-group m-5">
            <a class='btn btn-info btn-sm' href="{BASE_URL}admcat">Volver</a>
        </div>
    </form>
</section>
</main>
{include file='footer.tpl'}
