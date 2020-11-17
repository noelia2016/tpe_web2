<?php

include_once 'app/models/comentario.model.php';
include_once 'app/api/api.comentario.view.php';

class ApiComentarioController {

    private $model;
    private $view;

    function __construct() {
        
        $this->model = new ComentarioModel();
        $this->view = new ApiComentarioView();
    }

    /**
     * Muestra todos los comentarios de los usuarios
     */
    public function obtenerComentarios($params = null) {
        
        $comentarios = $this->model->obtenerComentarios();
        $this->view->response($comentarios, 200);
    }
    
    /**
     * Muestra un comentario especifico
     */
    public function obtenerComentario($params = null) {
        
        // $params es un array asociativo con los parámetros de la ruta
        $idComentario = $params[':ID'];
        $comentario = $this->model->obtenerComentario($idComentario);
        if ($comentario)
            $this->view->response($comentario, 200);
        else
            $this->view->response("El comentario con id=$idComentario no existe", 404);
    }
    
    /**
     * Elimina un comentario especifico
     */
    public function eliminarComentario($params = null) {
        
        // obtengo el id del paramentro a eliminar
        $idComentario = $params[':ID'];
        $comentario = $this->model->remove($idComentario);
        
        // si afecto datos en la base es porque elimino correctamente el comentario
        if ($comentario > 0) {
            $this->view->response("El comentario con el id=$idComentario se borró exitosamente", 200);
        }
        else { 
            $this->view->response("El comentario con el id=$idComentario no existe", 404);
        }
    }
    
    /**
     * Inserta un nuevo comentario 
     */
     
    // $params es un array asociativo con los parámetros de la ruta
    public function crearComentario($params = null) {
        
        // obtengo los datos ingresados por el usuario en el formulario
        $puntos = $params[':puntuacion'];
        $mensaje = $params[':mensaje'];
        $habitacion = $params[':habitacion'];
        $usuario = $params[':usuario'];
        
        // lo inserto en mi BD
        $comentario = $this->model->insertarComentario($puntuacion, $mensaje, $usuario, $habitacion);
        // si inserto el comentario muestro la respuesta de todo ok
        if ($comentario > 0){
            $this->view->response($comentario, 200);
        }else{
            // si ocurrio un error notifico
            $this->view->response("Ups!! ocurrio un error al intentar insertar comentario.", 404);
        }
    }


}
?>