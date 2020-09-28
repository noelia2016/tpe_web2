<?php

require_once('libs/smarty/libs/Smarty.class.php');

class CategoriaView {

    /** 
        Muestra el listado de categorias existentes 
    **/
    function mostrarCategorias($categorias) {
        /*$smarty = new Smarty();

        $smarty->assign('msg', $msg);
    
        $smarty->display('templates/categorias.tpl');+/
        
        include 'templates/header.php';*/

        echo "<ul class='list-group mt-5'>";
        foreach($categorias as $cat) {
            echo "<li class='list-group-item'>
                    $cat->nombre | $cat->descripcion
                </li>";
        }
        echo "</ul>";

    
        include 'templates/footer.php';
    }
    
}