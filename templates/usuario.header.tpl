{include 'head.tpl'}
  <header>
    <nav class="navbar navbar-expand-lg fondo_oscuro">
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
                <li class="nav-item">
                    <a class="nav-link" href="contacto">Contanos tu experiencia</a>
                </li>
                <li class="nav-item ml-auto">
                    <a class="nav-link" href="logout">Bienvenido {$smarty.session.USER} (Cerrar sesión)</a>
                </li>
            </ul>
        </div>
    </nav>
  </header>

  <main class="container fondo_container pt-5">
    <!-- inicio del contenido principal -->