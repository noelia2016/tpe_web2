 {include 'header.tpl'}
  <form class='form-signin' action='verificar_login' method='POST'>
        <h1 class='h3 mb-3 font-weight-normal'>Iniciar session</h1>
        <div class="form-group">
            <label for='inputEmail' class='sr-only'>Usuario:</label>
            <input type='text' name='usuario' id='usuario' class='form-control' placeholder='Usuario' required autofocus>
        </div>
        <div class="form-group">
            <label for='inputPassword' class='sr-only'>Password</label>
            <input type='password' name='password' id='password' class='form-control' placeholder='Password' required>
        </div>
        <div class="form-group">
            <button class='btn btn-lg btn-primary btn-block' type='submit'>Login</button>
        </div>
        <small id="passwordHelp" class="form-text text-muted">
           <a href="">Olvidaste tu password</a>
        </small>
   </form>
   {include 'footer.tpl'}
   