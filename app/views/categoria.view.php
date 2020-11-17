<?php

require_once('libs/smarty/libs/Smarty.class.php');

class CategoriaView {

    /** 
     *   Muestra el listado de categorias existentes 
    **/
    function mostrarCategorias($categorias) {
        
        $smarty = new Smarty();

        $smarty->assign('categorias', $categorias);
    
        $smarty->display('templates/categorias.tpl');
    }
    
    /** 
     *  Muestra la categoria elegida con sus detalles y habitaciones que posee asociadas
    **/
    function mostrarCategoria ($categoria, $habitaciones, $mostrar){
        
        $smarty = new Smarty();
        //$smarty->debugging = true;
        $smarty->assign('categoria', $categoria);
        $smarty->assign('habitaciones', $habitaciones);
        $smarty->assign('mostrar', $mostrar);
        $smarty->display('templates/ver.categoria.tpl');

    }
    
}