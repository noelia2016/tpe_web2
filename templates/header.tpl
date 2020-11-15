    {include 'head.tpl'}
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"">
            <a class="navbar-brand" href="home">Hotel 3sarro</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav d-flex w-100">
                <li class="nav-item active">
                  <a class="nav-link" href="home">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="servicios">Servicios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contacto">Contacto</a>
                </li>
                {* si inicio session y es usuario -- NO ADMINISTRADOR *}
                {if ($smarty.session.USER && $smarty.session.TIPO_USER == 0)}
                    <li class="nav-item ml-auto">
                        <a class="nav-link" href="logout">Bienvenido {$smarty.session.USER} (Cerrar sesión)</a>
                    </li>
                {else}
                    {* si inicio session todavia *}
                    <li class="nav-item ml-auto">
                      <a class="nav-link" href="login">Iniciar sesión</a>
                    </li>
                {/if}
              </ul>
            </div>
          </nav>
    </header>
    <main class="container"> <!-- inicio del contenido principal -->