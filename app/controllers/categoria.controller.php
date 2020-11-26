<?php

include_once 'app/models/categoria.model.php';
include_once 'app/views/admin.categoria.view.php';
include_once 'app/views/categoria.view.php';
include_once 'app/helpers/sesion.helper.php';
include_once 'app/helpers/error.helper.php';

class CategoriaController
{

    private $model;
    private $view;
    private $viewAdmin;
    private $sesionHelper;
    private $errorHelper;

    function __construct()
    {
        $this->model = new CategoriaModel();
        $this->view = new CategoriaView();
        $this->viewAdmin = new AdminCategoriaView();
        $this->sesionHelper = new SesionHelper();
        $this->errorHelper = new ErrorHelper();

        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->checkLogged();
        //Verifico usuario administrador, si no, redirige al login
        $this->sesionHelper->esta_logueadoAdministrador() ;
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

        // debo verificar si esta registrado como usuario comun para permitirle comentar
        $mostrar=$this->sesionHelper->esta_logueadoUserNormal();

        // actualizo la vista
        $this->view->mostrarCategoria($categoria, $habitaciones, $mostrar);
    }

    function eliminarCategoria($id)
    {
        if (($_SESSION['TIPO_USER'] == 1)) {
            if (is_numeric($id)) {
                $borrado = $this->model->eliminarCategoriaMdl($id);
                if ($borrado) {
                    $mensaje = "La categoria ha sido eliminada";
                } else {
                    $mensaje = "No se pudo borrar la categoria
                     porque hay habitaciones asignadas a la misma";
                }
            } else {
                $mensaje = "No se pudo recuperar categoria de la base de datos";
                $borrado = false;
            }
            $this->redirigirListaCatMensaje($mensaje, $borrado);
        } else {
           // si no viene un numero por parametro
            $camino = 'admcat';
            $this->errorHelper->pantallaDeError($camino);
        }
    }

    function nuevaCategoria()
    {
        $this->viewAdmin->altaCategoriaVista();
    }

    function editarCategoria($id)
    {
        if (($_SESSION['TIPO_USER'] == 1)) {
            $valido = true;

            if (is_numeric($id)) {
                $categoria = $this->model->obtenerCategoria($id);
                if ($categoria) {
                    $this->viewAdmin->editarCategoriaVista($categoria);
                } else {
                    $valido = false;
                    $mensaje = "No se pudieron recuperar los datos de la categoria";
                    $this->redirigirListaCatMensaje($mensaje, $valido);
                }
            } else {
                $valido = false;
                $mensaje = "No se pudieron recuperar los datos de la categoria";
                $this->redirigirListaCatMensaje($mensaje, $valido);
            }
        } else {
            // si no viene un numero por parametro
            $camino = 'admcat';
            $this->errorHelper->pantallaDeError($camino);
        }
    }
    function guardarCategoria()
    {
        if (($_SESSION['TIPO_USER'] == 1)) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];

            // verifico campos obligatorios
            if (empty($nombre) || empty($descripcion)) {
                $mensaje = "Debe completar los datos de la categoria";
                $valido = false;
                $this->redirigirListaCatMensaje($mensaje, $valido);
            } else {
                if (!empty($_POST['id_categoria'])) {   //actualizo los datos de una categoria existente
                    $id = $_POST['id_categoria'];
                    $this->model->actualizarCategoriaMdl($id, $nombre, $descripcion);
                    $actualizado = true;
                    $mensaje = "Datos de categoria actualizados satisfactoriamente";
                    $this->redirigirListaCatMensaje($mensaje, $actualizado);
                } else {
                    // inserto una nueva categoria en la DB
                    $id = $this->model->insertarCategoriaMdl($nombre, $descripcion);
                    $valido = (!is_null($id) && ($id > 0));
                    if ($valido) {
                        $mensaje = "Se creó la categoria de manera exitosa";
                    } else {
                        $mensaje = "No se pudo crear nueva categoria. Verifique los datos ingresados";
                    }
                    $this->redirigirListaCatMensaje($mensaje, $valido);
                }
            }
        } else {
            // si no viene un numero por parametro
            $camino = 'admcat';
            $this->errorHelper->pantallaDeError($camino);
        }
    }

    function redirigirListaCatMensaje($mensaje, $actualizado)
    {
        $categorias = $this->model->obtenerCategorias();
        $this->viewAdmin->mostrarMensajeCategoria($categorias, $mensaje, $actualizado);
    }
}
