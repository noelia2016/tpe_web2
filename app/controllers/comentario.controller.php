<?php

include_once 'app/views/comentario.view.php';

class ComentarioController {

    private $view ;

    function __construct() {
        
        $this->view = new ComentarioView();
  
    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function listarComentarios(){
        
        $this->view->listarComentarios();      
    }

}
    
   
?>