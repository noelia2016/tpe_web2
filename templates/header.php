<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?=BASE_URL?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Hotelero</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-dark fondo_oscuro">
            <a class="navbar-brand" href="#">Hotel Tres Arroyos</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="#">Servicios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registrar" target="_blank">Registrarse</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login" target="_blank">Iniciar session</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>

    <main class="container fondo_container"> <!-- inicio del contenido pricipal -->