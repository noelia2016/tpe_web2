<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 23:31:20
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\form_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f764aa838ae12_26486135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '21a165abc360cf3524d4f3261ff180649cd18186' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\form_login.tpl',
      1 => 1601587876,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f764aa838ae12_26486135 (Smarty_Internal_Template $_smarty_tpl) {
?> <?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  <form class='form-signin' action='verificar_login' method='POST'>
        <h1 class='h3 mb-3 font-weight-normal'>Iniciar session</h1>
        <div class="form-group">
            <label for='inputEmail' class='sr-only'>Usuario:</label>
            <input type='text' name='usuario' id='usuario' class='form-control' placeholder='Usuario' required autofocus>
        </div>
        <div class="form-group">
            <label for='inputPassword' class='sr-only'>Password</label>
            <input type='password' name='password' id='password' class='form-control' placeholder='Password' required>
        </div>
        <div class="form-group">
            <button class='btn btn-lg btn-primary btn-block' type='submit'>Login</button>
        </div>
        <small id="passwordHelp" class="form-text text-muted">
           <a href="">Olvidaste tu password</a>
        </small>
   </form>
   <?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
   <?php }
}
