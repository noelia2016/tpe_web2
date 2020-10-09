<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/models/categoria.model.php';
include_once 'app/views/home.view.php';

class HomeController {

    private $model, $modelH;
    private $view;

    function __construct() {
        
        $this->model = new CategoriaModel();
        $this->modelH = new HabitacionModel();
        $this->view = new HomeView();
    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function mostrarHome(){
        
        $categorias=$this->model->obtenerCategorias();
        $this->view->mostrarHome($categorias);
    }
    
    /**
     * Muestra los servicios que ofrece al hotel husped
     */
    function mostrarServicios(){
        
        $this->view->mostrarServicios();
    }
    
    /**
     * Muestra los servicios que ofrece al hotel husped
     */
    function mostrarContacto(){
        
        $this->view->mostrarContacto();
    }

}
?>