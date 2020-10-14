<?php

include_once 'app/models/categoria.model.php';
include_once 'app/views/admin.categoria.view.php';
include_once 'app/views/categoria.view.php';
include_once 'app/helpers/sesion.helper.php';

class CategoriaController
{

    private $model;
    private $view;
    private $viewAdmin;
    private $sesionHelper;

    function __construct()
    {
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
    function mostrarCategorias()
    {
        // obtiene las diferentes categorias del modelo
        $categorias = $this->model->obtenerCategorias();

        // actualizo la vista
        $this->viewAdmin->mostrarListaCategorias($categorias);
    }

    /**
     * Imprime los detalles de la categoria con las habitaciones que dispone
     */
    function mostrarCategoria($id)
    {
        // obtiene las diferentes categorias del modelo
        $categoria = $this->model->obtenerCategoria($id);
        $habitaciones = $this->model->obtenerHabitacionesdeCategoria($id);

        // actualizo la vista
        $this->view->mostrarCategoria($categoria, $habitaciones);
    }

    function eliminarCategoria($id)
    {
        if (is_numeric($id)) {
            $borrado = $this->model->eliminarCategoriaMdl($id);
            if ($borrado) {
                header("Location: " . BASE_URL . "admcat");
            } else {
                $mensaje = "No se pudo borrar la categoria
                     porque hay habitaciones asignadas a la misma";
                $this->redirigirListaCatError($mensaje);
            }
        } else {
            $mensaje = "No se pudo recuperar categoria de la base de datos";
            $this->redirigirListaCatError($mensaje);
        }
    }

    function nuevaCategoria()
    {
        $this->viewAdmin->altaCategoriaVista();
    }

    function editarCategoria($id)
    {
        $mensaje = "No se pudo recuperar categoria de la base de datos";
        if (is_numeric($id)) {
            $categoria = $this->model->obtenerCategoria($id);
            if ($categoria) {
                $this->viewAdmin->editarCategoriaVista($categoria);
            } else {
                $this->redirigirListaCatError($mensaje);
            }
        } else {
            $this->redirigirListaCatError($mensaje);
        }
    }
    function guardarCategoria()
    {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];

        // verifico campos obligatorios
        if (empty($nombre) || empty($descripcion)) {
            //mensaje de aviso? 
            die();
        }
        if (!empty($_POST['id_categoria'])) {   //actualizo los datos de una categoria existente
            $id = $_POST['id_categoria'];
            $this->model->actualizarCategoriaMdl($id, $nombre, $descripcion);
        } else {
            // inserto una nueva categoria en la DB
            $id = $this->model->insertarCategoriaMdl($nombre, $descripcion);
        }

        // redirigimos a la lista
        header("Location: " . BASE_URL . "admcat");
    }

    function redirigirListaCatError($mensaje)
    {
        $categorias = $this->model->obtenerCategorias();
        $this->viewAdmin->mostrarErrorIDCategoria($categorias, $mensaje);
    }
}
