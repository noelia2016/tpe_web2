<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/models/categoria.model.php';
include_once 'app/views/home.view.php';
include_once 'app/views/categoria.view.php';
include_once 'app/views/habitacion.view.php';

class HomeController {

    private $model, $modelH;
    private $view, $viewC, $viewH;

    function __construct() {
        
        $this->modelC = new CategoriaModel();
        $this->modelH = new HabitacionModel();
        $this->view = new HomeView();
        $this->viewH = new HabitacionView();
        $this->viewC = new CategoriaView();
    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function mostrarHome(){
        
        $categorias=$this->modelC->obtenerCategorias();
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
    
    /**
     * Imprime los detalles de la categoria con las habitaciones que dispone
     */
    function mostrarCategoria($id) {
        
       if (is_numeric($id)){
            // obtiene los detalles de la categoria elegida
            $categoria = $this->modelC->obtenerCategoria($id);
            // obtengo las habitaciones asociadas a la categoria elegida
            $habitaciones = $this->modelC->obtenerHabitacionesdeCategoria($id);
            // actualizo la vista
            $this->viewC->mostrarCategoria($categoria, $habitaciones);
       }else{
           // si no viene un numero por parametro
           $camino='home';
           $this->view->pantallaDeError($camino);
       }

    }  
    
    /**
     * Imprime los detalles de la habitacion
     */
    function mostrarHabitacion($id)
    {

        if (is_numeric($id)){
            // se obtiene la habtacion con sus respectivos detalles y con los datos de la categoria
            $habitacion = $this->modelH->obtenerHabitacion($id);
            // actualizo la vista
            $this->viewH->mostrarDetalleHabitacion($habitacion);
        }else{
           // si no viene un numero por parametro
           $camino='home';
           $this->view->pantallaDeError($camino);     
        }
    }

}
?>