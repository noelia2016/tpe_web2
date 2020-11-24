<!-- ADMINISTRADOR: formulario de alta de habitación en el hotel -->
{include file= 'admin.header.tpl'}
<section class="container-fluid center fondo_container">
<h2>Alta habitación</h2>
    <form action="guardar_hab" method="POST" class="my-4" enctype="multipart/form-data">
        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    <label>Nro de habitación:</label>
                    <input name="nro_habitacion" type="number" class="form-control" value = ''>
                    <label>Capacidad de personas:</label>
                    <input name="capacidad" type="number" class="form-control" value = ''>
                    <label>Comodidades:</label>
                    <textarea name="comodidades" class="form-control" rows="3" wrap="hard"></textarea>
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <div class="form-group-row">
                    <label>Categoria</label>
                    {* lista de categorias --> nombre e ids *}  
                    <select name="id_categoria" class="form-control">
                        <option value=''></option> 
                        {foreach from=$categorias item=categoria} 
                             <option value={$categoria->id}> {$categoria->nombre}</option>
                        {/foreach}
                    </select>
                    <label>Estado:</label>
                    <select name="estado" class="form-control">
                        <option value=''></option>
                        {html_options values=$estado output=$estado}
                    </select>
                    <label>Ubicación:</label>
                    <input name="ubicacion" type="text" class="form-control" value = ''>
                </div>
            </div>
			<div class="col-12 col-sm-6">
				<div class="form-group mt-3">
					<label for="exampleFormControlFile1">Cargue imagen:</label>
					<input type="file" class="form-control-file" name="input_name" id="imageToUpload" accept="image/png, jpeg, .jpg">
					<small id="passwordHelpBlock" class="form-text text-muted">
					  Las imagenes deben tener extension .jpeg, .jpg o .png
					</small>
				</div>
			</div>
        </div>
        <div class="btn-group m-5">
            <input class='btn btn-info btn-sm' value="Guardar" type="submit">
        </div>
        <div class="btn-group m-5">
            <a class='btn btn-info btn-sm' href="{BASE_URL}admhab">Volver</a>
        </div>
    </form>
</section>
</main>
{include file='footer.tpl'}
