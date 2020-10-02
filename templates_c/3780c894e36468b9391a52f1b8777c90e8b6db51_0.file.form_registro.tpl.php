<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 01:23:45
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\form_registro.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f766501ed4dc7_12056614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3780c894e36468b9391a52f1b8777c90e8b6db51' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\form_registro.tpl',
      1 => 1601594518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f766501ed4dc7_12056614 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <h1 class='h3 mb-3 font-weight-normal'>Registrar usuario:</h1>
    <form class='form-signin' id="form_registro" action='verificar_registro' method='POST'>
        <div class="form-group">
            <label for="exampleFormControlInput1">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required/>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required/>
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
            <input type="date" id="fecha_nac" name="fecha_nac" required/>
        </div>
       <div class="form-group">
            <label for="exampleFormControlInput1">Email:</label>
            <input id="email" type="email" name="email" min="1" max="10" required/>
       </div>
       <div class="form-group">
           <label for="exampleFormControlInput1">Nombre de usuario:</label>
            <input type="text" id="user" name="user" required/>
       </div>
       <div class="form-group">
            <label for="exampleFormControlInput1">Password:</label>
            <input type="password" id="clave" name="clave" required/>
       </div>
       <div class="form-group">
            <label for="exampleFormControlInput1">Repetir Password:</label>
            <input type="password" id="claveR" name="claveR" required/>
       </div>
       <div class="form-group">
            <input type="submit" id="btn_agregar" class="btn btn-primary" value="<< AGREGAR >>"/>
       </div>
    </form>
    <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
