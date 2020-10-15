<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/views/admin.habitacion.view.php';
include_once 'app/views/habitacion.view.php';
include_once 'app/models/categoria.model.php';
include_once 'app/helpers/sesion.helper.php';

class HabitacionController
{

    private $model;
    private $view, $viewAdmin;
    private $modelCat;
    private $sesionHelper;

    function __construct()
    {
        $this->model = new HabitacionModel();
        $this->modelCat = new CategoriaModel();
        $this->viewAdmin = new AdminHabitacionView();
        $this->view = new HabitacionView();
        $this->authHelper = new SesionHelper();

        // verifico que el usuario esté logueado siempre
        $this->authHelper->checkLogged();

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
    {   $estadoActualiz = false ;
        $mensaje = "No se pudieron recuperar datos de la 
                    habitación en la base de datos";
        // obtener los datos de una habitación del modelo
        if (is_numeric($id)){
            $habitacion = $this->model->obtenerHabitacion($id);
            $lista_cat = $this->modelCat->obtenerCategorias();
            // actualizo la vista cargando los datos en el formulario de habitación
            if ($habitacion) {
                $this->viewAdmin->editarHabitacionVista($habitacion, $lista_cat);
            } else {
                //al principio seteamos mensaje y estadoActualiz -> falso
                $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
            }
        }
        else {
            //al principio seteamos mensaje y estadoActualiz -> falso
            $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
        }
    }

    function eliminarHabitacion($id)
    {   
        // eliminar una habitación 
        if (is_numeric($id)) {
            $this->model->eliminarHabitacionMdl($id);
            $mensaje = "La habitación ha sido eliminada";
            $borrado = true ;
            $this->redirigirListaHabPostActualiz($mensaje, $borrado);           
        }
        else
        {   
            $mensaje = "No se pudo eliminar la habitación en la base de datos";
            $borrado = false ;
            $this->redirigirListaHabPostActualiz($mensaje, $borrado);

        }
    }

    function guardarHabitacion()
    {   
        $estadoActualiz = false ;

        $categoria_id = $_POST['id_categoria'];
        $nro_habitacion = $_POST['nro_habitacion'];
        $capacidad = $_POST['capacidad'];
        $estado = $_POST['estado'];
        $comodidades = $_POST['comodidades'];
        $ubicacion = $_POST['ubicacion'];
        
          // verifico campos obligatorios
        if (empty($categoria_id) || empty($nro_habitacion) || 
            empty($capacidad) || empty($ubicacion)) {
                $mensaje = "Debe completar los datos de la habitación";
                $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
            }
        else{
            if (isset($_POST['id_habitacion']) )
            {   //actualizo los datos de una habitación existente
                $id = $_POST['id_habitacion'] ;
                $this->model->actualizarHabitacionMdl(
                                $id, $nro_habitacion, $estado,
                                $categoria_id, $capacidad, $comodidades, $ubicacion);
                $mensaje = "Se actualizaron los datos de la habitación";
                $estadoActualiz = true ;
                $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
            }
            else
            {
                // inserto una nueva habitación en la DB
                $id = $this->model->insertarHabitacionMdl($nro_habitacion, $estado,
                    $categoria_id, $capacidad, $comodidades, $ubicacion);
                    if (!is_null($id) && ($id > 0)){
                        $mensaje = "Se creó la habitación de manera exitosa" ;
                        $estadoActualiz = true ;
                         $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);;
                    }
            }
        }
               
    }
    
    function nuevaHabitacion()
    {
        // obtener los datos de las categorias del modelo
        $lista_cat = $this->modelCat->obtenerCategorias();
        $this->viewAdmin->altaHabitacionVista($lista_cat);
      
    }

    function redirigirListaHabPostActualiz($mensaje, $actualizado)
    {
        $habitaciones = $this->model->obtenerHabitaciones();
        $this->viewAdmin->mostrarMensajeActuHabitacion($habitaciones, $mensaje, $actualizado);
    }
}
