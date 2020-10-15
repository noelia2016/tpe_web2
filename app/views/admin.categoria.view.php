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

    function altaCategoriaVista(){
        $smarty = new Smarty(); 
        $smarty->display('templates/admin.form.alta.cat.tpl'); 
    }

    function editarCategoriaVista($categoria){
        $smarty = new Smarty(); 
        $smarty->assign('categoria', $categoria);
        $smarty->display('templates/admin.form.edit.cat.tpl'); 
    }

    function mostrarMensajeCategoria($categorias, $mensaje, $exito){
        $smarty = new Smarty(); 
        $smarty->assign('categorias', $categorias);
        if ($exito){
            $smarty->assign('mensajeBien', $mensaje);
        }
        else
        {
            $smarty->assign('mensaje', $mensaje);
        }
        $smarty->display('templates/admin.lista.cat.tpl');
    }
}
