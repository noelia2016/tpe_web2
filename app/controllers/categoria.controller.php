<?php

include_once 'app/models/categoria.model.php';
include_once 'app/views/admin.categoria.view.php';

class CategoriaController {

    private $model;
    private $view; 
    private $viewAdmin;

    function __construct() {
        $this->model = new CategoriaModel();
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
    function eliminarCategoria($id) {
        // eliminar una habitación 
        return $this->model->eliminarCategoriaMdl($id);
       
    }

}
