<?php

include_once 'app/helpers/sesion.helper.php';
include_once 'app/views/comentario.view.php';

class ComentarioController {

    private $view ;
    private $sesionHelper;

    function __construct() {
        
        $this->view = new ComentarioView();
        $this->sesionHelper = new SesionHelper(); 
        /*$this->sesionHelper->checkLogged();
        $this->sesionHelper->esta_logueadoAdministrador();*/

    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function listarComentarios(){
        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->checkLogged();
        $this->view->listarComentarios();      
    }

}
    
   
?>