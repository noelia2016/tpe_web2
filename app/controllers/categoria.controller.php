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
        $this->model->eliminarCategoriaMdl($id);
        // redirigimos a la lista
        header("Location: " . BASE_URL . "admcat"); 
       
    }

    function nuevaCategoria() {
        $this->viewAdmin->altaCategoriaVista();
    }

    function editarCategoria($id){
        $categoria = $this->model->obtenerCategoria($id);
        if ($categoria) {
            $this->viewAdmin->editarCategoriaVista($categoria);
        } else {
            //no se encontró la categoria con ese id
        }
    }
    function guardarCategoria(){
        {   $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            
              // verifico campos obligatorios
            if (empty($nombre) || empty($descripcion)) {
                //mensaje de aviso? 
                die();
            }
            if (!empty($_POST['id_categoria']) )
            {   //actualizo los datos de una categoria existente
                $id = $_POST['id_categoria'] ;
                $this->model->actualizarCategoriaMdl($id, $nombre, $descripcion);
            }
            else
            {
                // inserto una nueva categoria en la DB
                $id = $this->model->insertarCategoriaMdl($nombre, $descripcion);
            }
    
            // redirigimos a la lista
            header("Location: " . BASE_URL . "admcat"); 
            
        }
    }
}
