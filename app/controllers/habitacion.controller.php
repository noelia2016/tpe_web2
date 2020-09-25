<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/views/admin.habitacion.view.php';

class HabitacionController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new HabitacionModel();
        $this->view = new AdminHabitacionView();
    }

    function mostrarHabitaciones() {
        // obtiene todas las habitaciones del modelo
        $habitaciones = $this->model->obtenerHabitaciones();

       // actualizo la vista
       $this->view->mostrarHabitaciones($habitaciones);
        
    }

}
