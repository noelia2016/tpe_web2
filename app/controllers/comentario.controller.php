<?php

include_once 'app/helpers/sesion.helper.php';
include_once 'app/views/comentario.view.php';
include_once 'app/models/comentario.model.php';

class ComentarioController {

    private $view;
    private $model;
    private $sesionHelper;

    function __construct() {
        
        $this->view = new ComentarioView();
        $this->modelCat = new ComentarioModel();
        $this->sessionHelper = new SesionHelper();
        
    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function listarComentarios(){
        
        // verifico que el usuario esté logueado siempre
        $this->sessionHelper->checkLogged();
        $this->view->listarComentarios();      
    }

}
    
   
?>