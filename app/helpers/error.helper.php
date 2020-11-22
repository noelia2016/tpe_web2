<?php
// no muestra las notificaciones de php en el navegador
require_once('libs/smarty/libs/Smarty.class.php');

class ErrorHelper {
    public function __construct() {
        
    }

    /**
     * Muestra pantalla de error para el visitante
     */
    function pantallaDeError($camino)
    {

        $smarty = new Smarty();

        $smarty->assign('camino', $camino);

        $smarty->assign('mensaje', "Esta intentando ingresar a una seccion no valida.");

        $smarty->display('templates/notFound.tpl');
    }
    
}

?>