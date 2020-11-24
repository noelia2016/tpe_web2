<?php

include_once 'app/views/comentario.view.php';
include_once 'app/helpers/sesion.helper.php';

class ComentarioController {

    private $view ;
    private $sesionHelper;

    function __construct() {
        
        $this->view = new ComentarioView();
        $this->sesionHelper = new SesionHelper(); 
        $this->sesionHelper->esta_logueadoAdministrador();
  
    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function listarComentarios(){

        $this->view->listarComentarios();      
    }

}
    
   
?>