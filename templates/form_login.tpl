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
        
        <form class='form-signin' action='verificar' method='POST'>
            <h1 class='h3 mb-3 font-weight-normal'>Iniciar session</h1>
            <div class="form-group">
                <label for='inputEmail' class='sr-only'>Usuario:</label>
                <input type='text' id='usuario' class='form-control' placeholder='Usuario' required autofocus>
            </div>
            <div class="form-group">
                <label for='inputPassword' class='sr-only'>Password</label>
                <input type='password' id='password' class='form-control' placeholder='Password' required>
            </div>
            <div class="form-group">
                <button class='btn btn-lg btn-primary btn-block' type='submit'>Login</button>
            </div>
            <small id="passwordHelpBlock" class="form-text text-muted">
               <a href="">Olvidates tu password</a>
            </small>
        </form>
        
    </main>

</body>
</html> 