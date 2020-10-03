<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/views/admin.habitacion.view.php';
include_once 'app/views/habitacion.view.php';
include_once 'app/models/categoria.model.php';

class HabitacionController
{

    private $model;
    private $view, $viewAdmin;
    private $modelCat ;

    function __construct()
    {
        $this->model = new HabitacionModel();
        $this->modelCat = new CategoriaModel();
        $this->viewAdmin = new AdminHabitacionView();
        $this->view = new HabitacionView();
    }

    function mostrarHabitaciones()
    {
        // obtiene todas las habitaciones del modelo
        $habitaciones = $this->model->obtenerHabitaciones();
        // actualizo la vista
        $this->viewAdmin->mostrarHabitaciones($habitaciones);
    }

    /**
     * Imprime los detalles de la habitacion
     */
    function mostrarHabitacion($id)
    {

        $habitacion = $this->model->mostrarHabitacion($id);
        
        // actualizo la vista
        if ($habitacion) {
            $this->view->mostrarDetalleHabitacion($habitacion);
        } else {
            //no se encontró la habitacion con ese id
        }
    }

    function editarHabitacion($id)
    {
        // obtener los datos de una habitación del modelo
        $habitacion = $this->model->obtenerHabitacion($id);
        $categorias = $this->modelCat->obtenerCategorias();
        // actualizo la vista cargando los datos en el formulario de habitación
        if ($habitacion) {
            $this->viewAdmin->editarHabitacionVista($habitacion, $categorias);
        } else {
            //no se encontró la habitacion con ese id
        }
    }

    function eliminarHabitacion($id)
    {
        // eliminar una habitación 
        return $this->model->eliminarHabitacionMdl($id);
    }

    function actualizarHabitacion()
    {
        //si $_POST['$id_habitacion]') > 0 --> actualizar datos en modelo
        //si id habitacion es 0 --> nueva habitacion
        $id=$_POST['nombre'];
        //pasar al modelo todos los datos en variables o json
        //en el modelo se actualiza la tabla
    }
}
