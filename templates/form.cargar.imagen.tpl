<!-- ADMINISTRADOR: formulario de alta de habitación en el hotel -->
{include file= 'admin.header.tpl'}
<section class="container-fluid center fondo_container">
    <h2>Cargar imagen a una habitación:</h2>
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
            <input type="file" class="form-control-file" name="input_name" id="imageToUpload" accept="image/png, jpeg, .jpg" required>
            <small id="passwordHelpBlock" class="form-text text-muted">
              Las imagenes deben tener extension .jpeg, .jpg o .png
            </small>
          </div>
        </div>
        <div class="btn-group m-3">
            <input class='btn btn-info btn-sm' value="Guardar" type="submit">
        </div> 
    </form>
	<div class="row">
         <div class="col-12">
             <h4>Imagenes cargadas para las habitaciones</h4>
             <div class="table-responsive">
                 <table class="table mt-3 text-left">
                     <thead>
                         <tr>
                             <th>Nombre</th>
                             <th>Habitacion</th>
                             <th>Acciones</th>
                         </tr>
                     </thead>
                     <tbody id="tabla-Body-categorias">
                         {foreach from=$imagenes item=img}
                             <tr>
								 <td>
                                     <img src="{$img->imagen}" alt="imagen de habitacion" width=120px;" heigth=120px;"/>
                                 </td>
                                 <td>
                                     {$img->nro_hab}
                                 </td>
                                 <td>
                                    <a class='btn btn-danger btn-sm' href='eliminar_imagen/{$img->id_img}'>Eliminar</a>
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
