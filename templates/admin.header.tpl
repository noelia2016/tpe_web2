{include 'head.tpl'}
  <header>
    <nav class="navbar navbar-expand-lg bg-light fondo_oscuro">
      <a class="navbar-brand" href="admhab">Sistema Hotelero</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-flex w-100">
          <li class="nav-item">
            <a class="nav-link" href="admcat">Categorias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout">Bienvenido {$smarty.session.USER} (Cerrar sesión)</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="container fondo_container pt-5">
    <!-- inicio del contenido pricipal -->