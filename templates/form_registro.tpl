<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Tres Arroyos</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>

    <main class="container"> <!-- inicio del contenido principal -->
        <h1 class='h3 mb-3 font-weight-normal'>Registrar usuario:</h1>
        <form class='form-signin' id="form_registro" action='registrar' method='POST'>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre:</label>
                <input type="text" id="nombre" required/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apellido:</label>
                <input type="text" id="apellido" required/>
            </div>
            <div class="form-group">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sexo" value="F" checked>
                  <label class="form-check-label" for="inlineRadio1">Femenino</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="sexo" value="M">
                  <label class="form-check-label" for="inlineRadio2">Masculino</label>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Fecha de nacimiento:</label>
                <input type="date" id="fecha_nac" required/>
            </div>
           <div class="form-group">
                <label for="exampleFormControlInput1">Email:</label>
                <input id="email" type="email" min="1" max="10" required/>
           </div>
           <div class="form-group">
               <label for="exampleFormControlInput1">Nombre de usuario:</label>
                <input type="text" id="user" required/>
           </div>
           <div class="form-group">
                <label for="exampleFormControlInput1">Password:</label>
                <input type="password" id="clave" required/>
           </div>
           <div class="form-group">
                <label for="exampleFormControlInput1">Repetir Password:</label>
                <input type="password" id="claveR" required/>
           </div>
           <div class="form-group">
                <input type="submit" id="btn_agregar" class="btn btn-primary" value="<< AGREGAR >>"/>
           </div>
        </form>
    </main>
    <!--script type="text/javascript" src="js/validar_formulario.js"></script-->
</body>
</html> 