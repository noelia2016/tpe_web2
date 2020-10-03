<?php
require_once('libs/smarty/libs/Smarty.class.php');

class AdminCategoriaView
{

    function mostrarListaCategorias($categorias)
    {
        $smarty = new Smarty(); 
        $smarty->assign('categorias', $categorias);
        $smarty->display('templates/admin.lista.cat.tpl');  

    }
}
