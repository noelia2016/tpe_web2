    {include 'header.login.tpl'}
    <h1 class='h3 mb-3 font-weight-normal'>Registrar usuario:</h1>
    {if isset($mensaje) && !empty($mensaje)}
        <div class="alert alert-dismissible alert-info">
          <strong>{$mensaje}</strong>
        </div>
    {/if}
    <form class='form-signin' id="form_registro" action='verificar_registro' method='POST'>
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required/>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required/>
        </div>
        <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sexo" value="F" checked>
              <label class="form-check-label" for="sexoF">Femenino</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sexo" value="M">
              <label class="form-check-label" for="sexoM">Masculino</label>
            </div>
        </div>
        <div class="form-group">
            <label for="fecha_nac">Fecha de nacimiento:</label>
            <input type="date" id="fecha_nac" name="fecha_nac" required/>
        </div>
       <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" required/>
       </div>
       <div class="form-group">
           <label for="usuario">Nombre de usuario:</label>
            <input type="text" id="user" name="user" required/>
       </div>
       <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="clave" name="clave" required/>
       </div>
       <div class="form-group">
            <label for="password">Repetir Password:</label>
            <input type="password" id="claveR" name="claveR" required/>
       </div>
       <div class="form-group">
            <input type="submit" id="btn_agregar" class="btn btn-primary" value="<< AGREGAR >>"/>
       </div>
    </form>
</main>
<!-- Optional JavaScript -->
<script type="text/javascript" src="js/validad_formulario.js"></script>
{include 'footer.tpl'}