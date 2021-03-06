        {include 'header.login.tpl'}
        <h1 class='h3 mb-3 font-weight-normal'>Actualiza tu password:</h1>
        {if isset($mensaje) && !empty($mensaje)}
            <div class="alert alert-dismissible alert-info mt-3">
              <strong>{$mensaje}</strong>
            </div>
        {/if}
        <form class='form-signin' id="form_actualizar" action='verificar_cambio_pass' method='POST'>
           <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input id="usuario" type="text" name="usuario" required/>
           </div>
           <div class="form-group">
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" required/>
           </div>
           <div class="form-group">
                <label for="password">Nueva Password:</label>
                <input type="password" id="claveNueva" name="claveNueva" required/>
           </div>
           <div class="form-group">
                <label for="password">Repetir Nueva Password:</label>
                <input type="password" id="claveNuevaR" name="claveNuevaR" required/>
           </div>
           <div class="form-group">
                <input type="submit" id="btn_agregar" class="btn btn-primary" value="<< ACTUALIZAR >>"/>
           </div>
        </form>
    </main>
    {include 'footer.tpl'}