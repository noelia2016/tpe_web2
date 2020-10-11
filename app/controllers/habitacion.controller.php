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
        $lista_cat = $this->modelCat->obtenerCategorias();
        // actualizo la vista cargando los datos en el formulario de habitación
        if ($habitacion) {
            $this->viewAdmin->editarHabitacionVista($habitacion, $lista_cat);
        } else {
            //no se encontró la habitacion con ese id
        }
    }

    function eliminarHabitacion($id)
    {
        // eliminar una habitación 
        $this->model->eliminarHabitacionMdl($id);
        // redirigimos a la lista
        header("Location: " . BASE_URL . "/admhab");
    }

    function guardarHabitacion()
    {
        $categoria_id = $_POST['id_categoria'];
        $nro_habitacion = $_POST['nro_habitacion'];
        $capacidad = $_POST['capacidad'];
        $estado = $_POST['estado'];
        $comodidades = $_POST['comodidades'];
        $ubicacion = $_POST['ubicacion'];
        
          // verifico campos obligatorios
        if (empty($categoria_id) || empty($nro_habitacion) || 
            empty($capacidad) || empty($ubicacion)) {
            //mensaje de aviso? 
            die();
        }
        if ($_POST['id_habitacion'] > 0 && !empty($_POST['id_habitacion']) )
        {   //actualizo los datos de una habitación existente
            $id = $_POST['id_habitacion'] ;
            $this->model->actualizarHabitacionMdl($id, $nro_habitacion, $estado,
            $categoria_id, $capacidad, $comodidades, $ubicacion);
        }
        else
        {
            // inserto una nueva habitación en la DB
            $id = $this->model->insertarHabitacionMdl($nro_habitacion, $estado,
                  $categoria_id, $capacidad, $comodidades, $ubicacion);
        }

        // redirigimos a la lista
        header("Location: " . BASE_URL . "/admhab"); 
        
    }
    
    function nuevaHabitacion()
    {
        // obtener los datos de las categorias del modelo
        $lista_cat = $this->modelCat->obtenerCategorias();
        $this->viewAdmin->altaHabitacionVista($lista_cat);
      
    }
}
