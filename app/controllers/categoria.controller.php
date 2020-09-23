<?php

include_once 'app/models/categoria.model.php';
include_once 'app/views/categoria.view.php';

class CategoriaController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
    }

    /**
     * Imprime la lista de categorias que hay de habitaciones
     */
    function mostrarHabitaciones() {
        // obtiene las diferentes categorias del modelo
        $categorias = $this->model->getAll();

       // actualizo la vista
       $this->view->mostrarCategorias($categorias);
        
    }

}
