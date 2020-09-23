<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/views/habitacion.view.php';

class HabitacionController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new HabitacionModel();
        $this->view = new HabitacionView();
    }

    /**
     * Imprime la lista de categorias que hay de habitaciones
     */
    function mostrarHabitaciones() {
        // obtiene las habitaciones del modelo
        $habitaciones = $this->model->getAll();

       // actualizo la vista
       $this->view->mostrarHabitaciones($habitaciones);
        
    }

}
