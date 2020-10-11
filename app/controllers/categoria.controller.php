<?php

include_once 'app/models/categoria.model.php';
include_once 'app/views/admin.categoria.view.php';
include_once 'app/views/categoria.view.php';
include_once 'app/helpers/sesion.helper.php';

class CategoriaController {

    private $model;
    private $view; 
    private $viewAdmin;
    private $sesionHelper;

    function __construct() {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
        $this->viewAdmin = new AdminCategoriaView();
        $this->authHelper = new SesionHelper();

        // verifico que el usuario esté logueado siempre
        $this->authHelper->checkLogged();
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
