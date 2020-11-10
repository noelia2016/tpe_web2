    <h1 class='h3 mb-3 font-weight-normal'>Danos tu opinion:</h1>
    {if isset($mensaje) && !empty($mensaje)}
        <div class="alert alert-dismissible alert-info">
          <strong>{$mensaje}</strong>
        </div>
    {/if}
    <div class="alert alert-info" role="alert">
        <span>Tu opinion nos interesa!!</span>
        <p>Por favor comentanos en que habitacion estuviste y como pasaste tu estadia en nuestras instalaciones.</p>
    </div>
    <form class='form-signin' id="form_comentario" action='registrar_comentario' method='POST'>
       <div class="form-group">
            <label for="fecha_nac">¿En que habitacion estuviste?</label>
            {* lista de categorias --> nombre e ids *}  
            <select name="id_categoria" class="form-control">
                <option value=''>Elegila aqui</option> 
                {foreach from=$habitaciones item=habitacion} 
                     <option value={$habitacion->id}> {$habitacion->nro} - {$habitacion->nro} - {$habitacion->ubicacion}</option>
                {/foreach}
            </select>
       </div> 
       <div class="form-group">
            <label for="password">Puntuacion:</label>
            <input type="number" id="puntos" name="puntos" required/>
       </div>
       <div class="form-group">
            <label for="exampleFormControlTextarea1">Opinion:</label>
            <textarea class="form-control" id="opinion" rows="3"></textarea>
       </div>
       <div class="form-group">
            <input type="submit" id="btn_agregar" class="btn btn-primary" value="<< COMENTAR >>"/>
       </div>
    </form>