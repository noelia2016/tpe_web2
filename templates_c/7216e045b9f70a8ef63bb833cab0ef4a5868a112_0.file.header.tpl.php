<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 23:49:26
  from 'C:\xampp\htdocs\Web2\tpe_web2\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f764ee64d7624_28341105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7216e045b9f70a8ef63bb833cab0ef4a5868a112' => 
    array (
      0 => 'C:\\xampp\\htdocs\\Web2\\tpe_web2\\templates\\header.tpl',
      1 => 1601588953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_5f764ee64d7624_28341105 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php $_smarty_tpl->_subTemplateRender('file:head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Hotel 3sarro</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="home">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="servicios">Servicios</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Contacto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registrar" target="_blank">Registrarse</a>
                </li>
                <li class="nav-item justify-content-end">
                  <a class="nav-link" href="login" target="_blank">Iniciar session</a>
                </li>
              </ul>
            </div>
          </nav>
    </header>
    <main class="container"> <!-- inicio del contenido principal --><?php }
}
