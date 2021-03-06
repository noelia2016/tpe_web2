    <h1 class='h3 mb-3 font-weight-normal'>Danos tu opinión:</h1>
    {if isset($mensaje) && !empty($mensaje)}
        <div class="alert alert-dismissible alert-info">
          <strong>{$mensaje}</strong>
        </div>
    {/if}
    <div class="alert alert-info" role="alert">
        <span>Tu opinión nos interesa!!</span>
        <p>Por favor comentanos como pasaste tu estadía en nuestras instalaciones.</p>
    </div>
    <form class='form-signin' id="opinion-form" action='insertarComentario' method='POST'enctype="multipart/form-data"> 
        <div class="form-group">
            <input type="hidden" id="usuario" name="usuario" value={$smarty.session.ID_USER} required/>
       </div>
       <div class="form-group">
            <input type="hidden" id="habitacion" name="habitacion" value={$id} required/>
       </div>
       <div class="form-group">
            <label for="puntos">Puntuación:</label>
            <input type="number" id="puntos" name="puntos" min=1 max=5 required/>
       </div>
       <div class="form-group">
            <label for="opinion">Opinión:</label>
            <textarea class="form-control" id="opinion" name="opinion" rows="3"></textarea>
       </div>
       <div class="form-group">
            <input type="submit" class="btn btn-primary" value="<< COMENTAR >>"/>
       </div>
    </form>