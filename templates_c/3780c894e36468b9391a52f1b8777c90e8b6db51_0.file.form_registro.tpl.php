<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 22:56:55
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\form_registro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f70fc977e0431_90309926',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3780c894e36468b9391a52f1b8777c90e8b6db51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\form_registro.tpl',
      1 => 1601240195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f70fc977e0431_90309926 (Smarty_Internal_Template $_smarty_tpl) {
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
    <!--script type="text/javascript" src="js/validar_formulario.js"><?php echo '</script'; ?>
-->
</body>
</html> <?php }
}
