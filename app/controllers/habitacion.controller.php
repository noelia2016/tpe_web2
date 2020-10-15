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
    
    /**
     * Muestra todas las habitaciones disponibles
     */
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
    
    /**
     * Modifica los detalles de la habitacion elegida
     */
    function editarHabitacion($id)
    {   
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
                $this->redirigirListaHabError($mensaje);
            }
        }
        else {
            $this->redirigirListaHabError($mensaje);
        }
    }
    
    /**
     * Elimina la habitacion elegida
     */
    function eliminarHabitacion($id)
    {    
        
        // eliminar una habitación 
        if (is_numeric($id)) {
            $borrado = $this->model->eliminarHabitacionMdl($id);
            if ($borrado > 0) {
                // redirigimos a la lista
                header("Location: " . BASE_URL . "admhab");
            }    
            else
            {  
                $mensaje = "No se pudo eliminar la habitación en la base de datos";
                $this->redirigirListaHabError($mensaje);
            }    
        }else
        {  
            $mensaje = "Ups!! Ocurrio un error vuelva a intentarlo.";
            $this->redirigirListaHabError($mensaje);
        }
    }
    
    /**
     * Inserta una nueva habitacion
     */
    function guardarHabitacion() {
        // tomo los datos que fueron ingresados por el usuario
        $categoria_id = $_POST['id_categoria'];
        $nro_habitacion = $_POST['nro_habitacion'];
        $capacidad = $_POST['capacidad'];
        $estado = $_POST['estado'];
        $comodidades = $_POST['comodidades'];
        $ubicacion = $_POST['ubicacion'];
        
          // verifico campos obligatorios
        if (empty($categoria_id) || empty($nro_habitacion) || 
            empty($capacidad) || empty($ubicacion)) {
/*<<<<<<< HEAD
            $mensaje = "Debe completar los datos de la habitación";
            $this->redirigirListaHabError($mensaje);
        }
        
        if (is_numeric($_POST['id_habitacion']) && !empty($_POST['id_habitacion']) )
        {   //actualizo los datos de una habitación existente
            $id = $_POST['id_habitacion'] ;
            $this->model->actualizarHabitacionMdl(
                            $id, $nro_habitacion, $estado,
                            $categoria_id, $capacidad, $comodidades, $ubicacion);
        }else{
            // inserto una nueva habitación en la DB
            $id = $this->model->insertarHabitacionMdl($nro_habitacion, $estado,
                  $categoria_id, $capacidad, $comodidades, $ubicacion);
                if ($id){
                $mensajeBien = "Se creó la habitación " . $id;
=======*/
                $mensaje = "Debe completar los datos de la habitación";
                $this->redirigirListaHabError($mensaje);
            }
        else{
            if (isset($_POST['id_habitacion']) )
            {   //actualizo los datos de una habitación existente
                $id = $_POST['id_habitacion'] ;
                $this->model->actualizarHabitacionMdl(
                                $id, $nro_habitacion, $estado,
                                $categoria_id, $capacidad, $comodidades, $ubicacion);
                $mensajeBien = "Se actualizaron los datos de la habitación";
//>>>>>>> 3fba8b287d5310608a7ab96a18bbadf0d22ab57c
                $this->redirigirListaHabPostActualiz($mensajeBien);
            }
            else
            {
                // inserto una nueva habitación en la DB
                $id = $this->model->insertarHabitacionMdl($nro_habitacion, $estado,
                    $categoria_id, $capacidad, $comodidades, $ubicacion);
                    if (!is_null($id) && ($id > 0)){
                        $mensajeBien = "Se creó la habitación de manera exitosa" ;
                        $this->redirigirListaHabPostActualiz($mensajeBien);
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

    function redirigirListaHabError($mensaje)
    {
        $habitaciones = $this->model->obtenerHabitaciones();
        $this->viewAdmin->mostrarErrorIDHabitacion($habitaciones, $mensaje);
    }

    function redirigirListaHabPostActualiz($mensajeBien)
    {
        $habitaciones = $this->model->obtenerHabitaciones();
        $this->viewAdmin->mostrarExitoActuHabitacion($habitaciones, $mensajeBien);
    }
}
