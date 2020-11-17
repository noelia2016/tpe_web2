<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/models/categoria.model.php';
include_once 'app/views/home.view.php';
include_once 'app/views/categoria.view.php';
include_once 'app/views/habitacion.view.php';
include_once 'app/helpers/sesion.helper.php';

class HomeController {

    private $model, $modelH;
    private $view, $viewC, $viewH;

    function __construct() {
        
        $this->modelC = new CategoriaModel();
        $this->modelH = new HabitacionModel();
        $this->view = new HomeView();
        $this->viewH = new HabitacionView();
        $this->viewC = new CategoriaView();
        $this->sesionHelper = new SesionHelper();
    }

    /**
     * Muestra la home del sitio para un visitante
     */
    function mostrarHome(){
        
        // chequeo el usuario que esta logueado
        $mostrar=$this->sesionHelper->esta_logueadoUserNormal();
        $categorias=$this->modelC->obtenerCategorias();
        $this->view->mostrarHome($categorias,$mostrar);
    }
    
    /**
     * Muestra los servicios que ofrece al hotel husped
     */
    function mostrarServicios(){
        
        // chequeo el usuario que esta logueado
        $mostrar=$this->sesionHelper->esta_logueadoUserNormal();
        $this->view->mostrarServicios($mostrar);
    }
    
    /**
     * Muestra los servicios que ofrece al hotel husped
     */
    function mostrarContacto(){
        
        // chequeo el usuario que esta logueado
        $mostrar=$this->sesionHelper->esta_logueadoUserNormal();
        // llama a la vista que necesita para mostrar los datos de contacto
        $this->view->mostrarContacto($mostrar);
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
            
            // chequeo el usuario que esta logueado
            $mostrar=$this->sesionHelper->esta_logueadoUserNormal();
                        
            // actualizo la vista
            $this->viewC->mostrarCategoria($categoria, $habitaciones, $mostrar);
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
       // si esl parametro ingresado es un numero
        if (is_numeric($id)){
            // se obtiene la habtacion con sus respectivos detalles y con los datos de la categoria
            $habitacion = $this->modelH->obtenerHabitacion($id);
            
            // debo verificar si esta registrado como usuario comun para permitirle comentar
            $mostrar=$this->sesionHelper->esta_logueadoUserNormal();
            
            //$comentarios = json_decode( file_get_contents("api/comentarios/"'.$id'), true );
            // llamo a la vista para mostrar los detalles de la habitacion
            $this->viewH->mostrarDetalleHabitacion($habitacion, $mostrar, $id);
        }else{
           // si no viene un numero por parametro
           $camino='home';
           $this->view->pantallaDeError($camino, $mostrar);     
        }
    }

}
?>