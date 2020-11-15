<?php

include_once 'app/models/comentario.model.php';
include_once 'app/views/comentario.view.php';
include_once 'app/helpers/sesion.helper.php';

class ComentarioController
{

    private $model;
    private $view;
    private $viewAdmin;
    private $sesionHelper;

    function __construct()
    {
        $this->model = new ComentarioModel();
        $this->view = new ComentarioView();
        $this->sessionHelper = new SesionHelper();

        // verifico que el usuario esté logueado siempre
        $this->sessionHelper->checkLogged();
    }

    /**
     * Muestra al usuario registrado el formulario para comentar
     */
    function realizar_comentario()
    {
        // obtiene las diferentes categorias del modelo
        $habitaciones = $this->model->obtenerCategorias();

        // actualizo la vista
        $this->viewAdmin->realizarComentario($habitaciones);
    }
    
    /**
     * Crea un comentario 
     */
    function registrar_comentario(){
        
        
    }