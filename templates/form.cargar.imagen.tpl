<!-- ADMINISTRADOR: formulario de alta de habitación en el hotel -->
{include file= 'admin.header.tpl'}
<section class="container-fluid center fondo_container">
    <h2>Cargar imagen a una habitacion:</h2>
    {if isset($mensaje) && !empty($mensaje)}
        <div class="alert alert-dismissible alert-info mt-3">
          <strong>{$mensaje}</strong>
        </div>
    {/if}
    <form class="my-4" action="guardar_imagen" method="POST" enctype="multipart/form-data">
        <div class="col-12 col-sm-6">
            <div class="form-group-row">
                <label>Habitacion:</label>  
                <select name="id_habitacion" class="form-control" required>
                    <option value=''>elegi habitación</option> 
                    {foreach from=$habitaciones item=habitacion} 
                         <option value={$habitacion->id}>{$habitacion->nro} - {$habitacion->nombre_cat}</option>
                    {/foreach}
                </select>
            </div>
        </div>
        <div class="col-12 col-sm-6">
          <div class="form-group mt-3">
            <label for="exampleFormControlFile1">Cargue imagen:</label>
            <input type="file" class="form-control-file" name="input_name" id="imageToUpload" required>
            <small id="passwordHelpBlock" class="form-text text-muted">
              Las imagenes deben tener extension .mpeg o .png
            </small>
          </div>
        </div>
        <div class="btn-group m-3">
            <input class='btn btn-info btn-sm' value="Guardar" type="submit">
        </div> 
    </form>
</section>
</main>
{include file='footer.tpl'}
