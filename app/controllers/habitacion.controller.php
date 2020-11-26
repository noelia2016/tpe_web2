<?php

include_once 'app/models/habitacion.model.php';
include_once 'app/views/admin.habitacion.view.php';
include_once 'app/views/habitacion.view.php';
include_once 'app/models/categoria.model.php';
include_once 'app/helpers/sesion.helper.php';
include_once 'app/helpers/error.helper.php';

class HabitacionController
{

    private $model;
    private $view, $viewAdmin;
    private $modelCat;
    private $sesionHelper;
    private $errorHelper;

    function __construct()
    {
        $this->model = new HabitacionModel();
        $this->modelCat = new CategoriaModel();
        $this->viewAdmin = new AdminHabitacionView();
        $this->view = new HabitacionView();
        $this->sesionHelper = new SesionHelper();
        $this->errorHelper = new ErrorHelper();

        // verifico que el usuario esté logueado siempre
        $this->sesionHelper->checkLogged();

        //Verifico usuario administrador, si no, redirige al login
        $this->sesionHelper->esta_logueadoAdministrador() ;

    }

    /**
     * Imprime los detalles de la habitacion
     */
    function mostrarHabitacion($id)
    {
        if(is_numeric($id)){
            $habitacion = $this->model->mostrarHabitacion($id);         
            // actualizo la vista
            if ($habitacion) {
                $this->view->mostrarDetalleHabitacion($habitacion);
            }
        }else{
            //no se encontró la habitacion con ese id
            $camino = 'admhab';
            $this->errorHelper->pantallaDeError($camino);
        }

    }
    
    /**
     * Edita los detalles de la habitacion pasada por parametro
     */
    function editarHabitacion($id)

    {   //revisar 
       
        if (($_SESSION['TIPO_USER'] == 1)) {
            $estadoActualiz = false;
            $mensaje = "No se pudieron recuperar datos de la 
                        habitación en la base de datos";
            // obtener los datos de una habitación del modelo
            if (is_numeric($id)) {
                $habitacion = $this->model->obtenerHabitacion($id);
                $lista_cat = $this->modelCat->obtenerCategorias();
                // actualizo la vista cargando los datos en el formulario de habitación
                if ($habitacion) {
                    $this->viewAdmin->editarHabitacionVista($habitacion, $lista_cat);
                } else {
                    //al principio seteamos mensaje y estadoActualiz -> falso
                    $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
                }
            } else {
                //al principio seteamos mensaje y estadoActualiz -> falso
                $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
            }
        } else {
            //no se encontró la habitacion con ese id
            $camino = 'admhab';
            $this->errorHelper->pantallaDeError($camino);
        }
    }
    
    /**
     * Elimina una habitacion especifica
     */
    function eliminarHabitacion($id)
    {
        // eliminar una habitación 
		if (is_numeric($id)) {
			$filas = $this->model->eliminarHabitacionMdl($id);
			if ($filas > 0){
				$mensaje = "La habitación ha sido eliminada";
				$borrado = true ;
				// si tiene comentarios asociados esa habitacion debo eliminarlos
				$tieneComentarios=$this->model->tieneComentariosAsociados($id);
				if ($tieneComentarios){
					$comentarios=$this->model->eliminarComentariosDeHabitacion($id);
					if($comentarios > 0){
						// si borro comentarios se lo agrego al mensaje que notifico.
						$mensaje .="Los comentarios asociados tambien fueron eliminados correctamente.";
					}
				}
			}
		} else {
			$mensaje = "No se pudo eliminar la habitación en la base de datos";
			$borrado = false;
		}
		$this->redirigirListaHabPostActualiz($mensaje, $borrado);
       
    }
    
    /**
     * Guarda los detalles de la habitacion ingresados por formulario
     */
    function guardarHabitacion()
    {
        if (($_SESSION['TIPO_USER'] == 1)) {
            $estadoActualiz = false;

            $categoria_id = $_POST['id_categoria'];
            $nro_habitacion = $_POST['nro_habitacion'];
            $capacidad = $_POST['capacidad'];
            $estado = $_POST['estado'];
            $comodidades = $_POST['comodidades'];
            $ubicacion = $_POST['ubicacion'];
			
			// verifico si mando una foto para asociar
			if(isset($_FILES['input_name']) && ($_FILES['input_name'] != null)){
				// si mando verifico las extensiones
				if($_FILES['input_name']['type'] != "image/jpg" || $_FILES['input_name']['type'] != "image/jpeg" || $_FILES['input_name']['type'] != "image/png"){
					$mensaje = "La extension elegida del archivo no es valida.";
				}
            }
			// verifico campos obligatorios
            if (
                empty($categoria_id) || empty($nro_habitacion) ||
                empty($capacidad) || empty($ubicacion)
            ) {
                $mensaje = "Debe completar los datos de la habitación";
                $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
            } else {
                if (isset($_POST['id_habitacion'])) {   //actualizo los datos de una habitación existente
                    $id = $_POST['id_habitacion'];
                    $this->model->actualizarHabitacionMdl(
                        $id,
                        $nro_habitacion,
                        $estado,
                        $categoria_id,
                        $capacidad,
                        $comodidades,
                        $ubicacion
                    );
                    $mensaje = "Se actualizaron los datos de la habitación";
                    $estadoActualiz = true;
                    $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);
                } else {
                    // inserto una nueva habitación en la DB
                    $id = $this->model->insertarHabitacionMdl(
                        $nro_habitacion,
                        $estado,
                        $categoria_id,
                        $capacidad,
                        $comodidades,
                        $ubicacion
                    );
                    if (!is_null($id) && ($id > 0)) {
						// agrego la imagen asociada si se cargo en archivo
						if(isset($_FILES['input_name']) && ($_FILES['input_name'] != null)){
							$idImg=$this->model->guardarImagen($id, $_FILES['input_name']['tmp_name']);
							if ($idImg > 0){
								$mensaje .=" con imagen.";
							}
						}
                        $mensaje = "Se creó la habitación de manera exitosa";
                        $estadoActualiz = true;
                        $this->redirigirListaHabPostActualiz($mensaje, $estadoActualiz);;
                    }
                }
            }
        } else {
            //no se encontró la habitacion con ese id
            $camino = 'admhab';
            $this->errorHelper->pantallaDeError($camino);
        }
    }
    
    /**
     * Muestra el formulario de alta de habitacion
     */
    function nuevaHabitacion()
    {
        // obtener los datos de las categorias del modelo
        $lista_cat = $this->modelCat->obtenerCategorias();
        $this->viewAdmin->altaHabitacionVista($lista_cat);
    }
    
    /**
     * Paginado de item de habitacion
     */
    function redirigirListaHabPostActualiz($mensaje, $actualizado)
    {
        $habitaciones = $this->model->obtenerHabitaciones();
        $this->viewAdmin->mostrarMensajeActuHabitacion($habitaciones, $mensaje, $actualizado);
    }

    /**
     * Obtiene todas las habitaciones
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
     function cargarImagen($mensaje = null){
         
        // obtiene todas las habitaciones disponibles
        $habitaciones = $this->model->obtenerHabitaciones();
		// obtengo las imagenes cargadas
		$imagenes = $this->model->obtenerTodasLasImagenes();
        // actualizo la vista
        $this->viewAdmin->cargarImagen($mensaje, $habitaciones, $imagenes);
     }
    
    /**
     * Carga una imagen para la galeria de una habitacion particular
     */
    function guardarImagen(){
        
        // obtiene todas las habitaciones disponibles
        $habitaciones = $this->model->obtenerHabitaciones();
		// obtengo las imagenes cargadas
		$imagenes = $this->model->obtenerTodasLasImagenes();
            
        // obtiene la imagen y la habitacion ingresada en el form
        $hab=$_POST['id_habitacion'];
        if($_FILES['input_name']['type'] == "image/jpg" || $_FILES['input_name']['type'] == "image/jpeg" || $_FILES['input_name']['type'] == "image/png"){
           $id=$this->model->guardarImagen($hab, $_FILES['input_name']['tmp_name']);
           // si agrego la imagen asociada muestro el mensaje de exito
           if($id > 0){
               $mensaje='La imagen se agrego correctamente';
           }else{
               // sino se agrego notifico
               $mensaje='Ups!! Ocurrio un error, nose puedo cargar la imagen';
           } 
        }else{
            $mensaje='La imagen cargada no es de las extensiones permitidas';
        }
		$this->viewAdmin->cargarImagen($mensaje, $habitaciones, $imagenes);
    }
	
	/**
     * Elimina una imagen de una habitacion
     */
	 function eliminarImagen($id)
    {
        // eliminar una habitación 
		if (is_numeric($id)) {
			$img = $this->model->eliminarImagenDeHab($id);
			if ($img > 0){
				$mensaje="La imagen se elimino correctamente";
			}else{
				$mensaje="Ups!! Ocurrio un error, nose puedo borrar la imagen.";
			}
			$this->cargarImagen($mensaje);
		}else{
			 //no se encontró la habitacion con ese id
            $camino = 'cargar_imagen';
            $this->errorHelper->pantallaDeError($camino);
		}
    }
}
