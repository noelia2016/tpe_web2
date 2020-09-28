<?php

require_once('libs/smarty/libs/Smarty.class.php');

class CategoriaView {

    /** 
        Muestra el listado de categorias existentes 
    **/
    function mostrarCategorias($categorias) {
        
        $smarty = new Smarty();

        $smarty->assign('msg', $msg);
    
        $smarty->display('templates/categorias.tpl');
        
        include 'templates/header.php';

    }
    
    /** 
        Muestra la categoria elegida con sus detalles y habitaciones que posee asociadas
    **/
    function mostrarCategoria ($categoria, $habitaciones){
        
        $smarty = new Smarty();

        $smarty->assign('categoria', $categoria);
        $smarty->assign('habitaciones', $habitaciones);
    
        $smarty->display('templates/ver_categoria.tpl');

    }
    
}