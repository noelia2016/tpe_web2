<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/views/admin.habitacion.view.php';
include_once 'app/views/habitacion.view.php';

class HabitacionController {

    private $model;
    private $view, $viewAdmin;

    function __construct() {
        $this->model = new HabitacionModel();
        $this->viewAdmin = new AdminHabitacionView();
        $this->view = new HabitacionView();
    }

    function mostrarHabitaciones() {
     // obtiene todas las habitaciones del modelo
        $habitaciones = $this->model->obtenerHabitaciones();
       // actualizo la vista
       $this->viewAdmin->mostrarHabitaciones($habitaciones);
        
    }
    
    /**
     * Imprime los detalles de la habitacion
     */
    function mostrarHabitacion($id) {
       
       $habitacion = $this->model->mostrarHabitacion($id);

       // actualizo la vista
       $this->view->mostrarDetalleHabitacion($habitacion);
        
    }

    function editarHabitacion($id) {
        // obtener los datos de una habitación del modelo
       $habitacion = $this->model->obtenerHabitacion($id);

       // actualizo la vista cargando los datos en el formulario de habitación
       $this->viewAdmin->editarHabitacionVista($habitacion);
        
    } 

    function eliminarHabitacion($id) {
        // eliminar una habitación 
        return $this->model->eliminarHabitacionMdl($id);
       
    }

}
