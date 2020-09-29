<?php

include_once 'app/models/categoria.model.php';
include_once 'app/views/admin.categoria.view.php';

class CategoriaController {

    private $model;
    private $view; 
    private $viewAdmin;

    function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
        $this->viewAdmin = new AdminCategoriaView();
    }

    /**
     * Imprime la lista de categorias que hay de habitaciones
     */
    function mostrarCategorias() {
        // obtiene las diferentes categorias del modelo
        $categorias = $this->model->obtenerCategorias();

       // actualizo la vista
       $this->viewAdmin->mostrarListaCategorias($categorias);
        
    }
    
    /**
     * Imprime los detalles de la categoria con las habitaciones que dispone
     */
    function mostrarCategoria($id) {
        // obtiene las diferentes categorias del modelo
        $categoria = $this->model->obtenerCategoria($id);
        $habitaciones = $this->model->obtenerHabitacionesdeCategoria($id);

       // actualizo la vista
       $this->view->mostrarCategoria($categoria, $habitaciones);

    }   
        
    function eliminarCategoria($id) {
        // eliminar una habitación 
        $this->model->eliminarCategoriaMdl($id);
       
    }
}
