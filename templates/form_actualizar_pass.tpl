    {include 'header.tpl'}
    <h1 class='h3 mb-3 font-weight-normal'>Actualiza tu password:</h1>
    <form class='form-signin' id="form_actualizar" action='verificar_cambio_pass' method='POST'>
       <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" required/>
       </div>
       <div class="form-group">
            <label for="password">Password anterior:</label>
            <input type="password" id="claveAnt" name="claveAnt" required/>
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
            <input type="submit" id="btn_agregar" class="btn btn-primary" value="<< AGREGAR >>"/>
       </div>
    </form>
    {include 'footer.tpl'}