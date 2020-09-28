<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 00:34:13
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fc1e5430c15_90496146',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2375a80cdd0d8e98013c079d8734f6cb6366d50c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\login.tpl',
      1 => 1601159648,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fc1e5430c15_90496146 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
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
            <h1 class='h3 mb-3 font-weight-normal'>Iniciar session:</h1>
            <label for='inputEmail' class='sr-only'>Usuario:</label>
            <input type='text' id='usuario' class='form-control' placeholder='Usuario' required autofocus>
            <label for='inputPassword' class='sr-only'>Password</label>
            <input type='password' id='password' class='form-control' placeholder='Password' required>
            <button class='btn btn-lg btn-primary btn-block' type='submit'>Login</button>
        </form>
        
    </main>

</body>
</html> <?php }
}
