<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 20:17:58
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\form_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f70d756600351_69393673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21a165abc360cf3524d4f3261ff180649cd18186' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\form_login.tpl',
      1 => 1601230672,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f70d756600351_69393673 (Smarty_Internal_Template $_smarty_tpl) {
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
</html> <?php }
}
