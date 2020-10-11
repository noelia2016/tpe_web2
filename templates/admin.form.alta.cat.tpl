<!-- ADMINISTRADOR: formulario de alta de categoria de habitación de hotel -->
{include file= 'admin.header.tpl'}
<section class="container-fluid center fondo_container">
    <h2>Alta de categoria</h2>
    <form action="guardar_cat" method="POST" class="my-4">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-control">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-control" rows="5"></textarea>
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