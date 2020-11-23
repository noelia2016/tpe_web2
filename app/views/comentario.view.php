<?php

require_once('libs/smarty/libs/Smarty.class.php');

class ComentarioView {

    /** 
     *   Muestra el formulario para un nuevo comentario
    **/
    function realizarComentario($habitaciones) {
        
        $smarty = new Smarty();

        $smarty->assign('habitaciones', $habitaciones);
    
        $smarty->display('templates/form.comentario.tpl');
    }

    function listarComentarios() {
        
        $smarty = new Smarty();

        $smarty->display('templates/admin.lista.comen.tpl');
    }
    
}