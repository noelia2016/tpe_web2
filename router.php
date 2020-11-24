<?php
include_once 'app/controllers/habitacion.controller.php';
include_once 'app/controllers/usuario.controller.php';
include_once 'app/controllers/home.controller.php';
include_once 'app/controllers/categoria.controller.php';
include_once 'app/controllers/comentario.controller.php';
include_once 'app/helpers/error.helper.php';

// defino la base url para la construccion de links con urls semánticas
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

// parsea la acción y los parámetros 
$params = explode('/', $action);
// determina que camino seguir según la acción
switch ($params[0]) {
    case 'home':
        /* muestra la pantalla principal del visitante */
        $controller = new HomeController();
        $controller->mostrarHome();
        break;
        /* operaciones de usuario */
    case 'login': 
        /* muestra al usuario la pantalla de login */
        $controller = new UsuarioController();
        $controller->login();
        break;
    case 'verificar_login': 
        /* verifica que el inicio de session sea correcto */
        $controller = new UsuarioController();
        $controller->verificarInicio();
        break; 
    case 'logout': 
        /* muestra al usuario la pantalla de login luego de cerrar sesion */
        $controller = new SesionHelper();
        $controller->logout();
        break;
    case 'registrar': 
        /* muestra el formulario de registro de usuario */
        $controller = new UsuarioController();
        $controller->registrar();
        break; 
    case 'verificar_registro': 
        $controller = new UsuarioController();
        $controller->verificar_registro();
        break;
    case 'recuperar_password': 
        $controller = new UsuarioController();
        $controller->recuperarPassword();
        break;
     case 'verificar_cambio_pass': 
        $controller = new UsuarioController();
        $controller->actualizar_pass();
        break;
    /* operaciones de vista home */
    case 'mostrar_categoria':
        /* muestra los detalles de la categoria elegida */
        $controller = new HomeController();
        $id = $params[1];
        $controller->mostrarCategoria($id);
        break;
    case 'mostrar_habitacion':
        /* muestra los detalles de la habitacion elegida */
        $controller = new HomeController();
        $id = $params[1];
        $controller->mostrarHabitacion($id);
        break;
    case 'servicios':
        /* muestra los servicios que brinda el hotel */
        $controller = new HomeController();
        $controller->mostrarServicios();
        break;
    case 'contacto':
        /* muestra los datos de contacto */
        $controller = new HomeController();
        $controller->mostrarContacto();
        break;
        /* operaciones de usuario administrador */
    case 'admhab':
        $controller = new HabitacionController();
        $controller->mostrarHabitaciones();
        break;
    case 'admcat':
        $controller = new CategoriaController();
        $controller->mostrarCategorias();
        break;
    case 'eliminar_hab':
        $controller = new HabitacionController();
        $id = $params[1];
        $controller->eliminarHabitacion($id);
        break;
    case 'editar_hab':
        $controller = new HabitacionController();
        $id = $params[1];
        $controller->editarHabitacion($id);
        break;
    case 'insertar_hab':
        $controller = new HabitacionController();
        $controller->nuevaHabitacion();
        break;
    case 'guardar_hab':
        $controller = new HabitacionController();
        $controller->guardarHabitacion();
        break;
    case 'eliminar_cat':
        $controller = new CategoriaController();
        $id = $params[1];
        $controller->eliminarCategoria($id);
        break;
    case 'editar_cat':
        $controller = new CategoriaController();
        $id = $params[1];
        $controller->editarCategoria($id);
        break;
    case 'insertar_cat':
        $controller = new CategoriaController();
        $controller->nuevaCategoria();
        break;
    case 'guardar_cat':
        $controller = new CategoriaController();
        $controller->guardarCategoria();
        break;
    case 'listar_usuarios':
        $controller = new UsuarioController();
        $controller->mostrarUsuariosPaginado();
        break;    
    case 'listar_usuarpag':
        $controller = new UsuarioController();
        $pagina = $params[1];
        $controller->mostrarUsuariosPaginado($pagina);
        break;
    case 'eliminar_usuario':
        $controller = new UsuarioController();
        $id = $params[1];
        $controller->eliminarUsuario($id);
        break;
    case 'editar_usuario':
        $controller = new UsuarioController();
        $id = $params[1];
        $controller->editarUsuario($id);
        break;
    case 'guardar_usu':
        $controller = new UsuarioController();
        $controller->guardarUsuario();
        break; 
    case 'cargar_imagen':
        $controller = new HabitacionController();
        $controller->cargarImagen();
        break; 
    case 'guardar_imagen':
        $controller = new HabitacionController();
        $controller->guardarImagen();
        break; 
	case 'eliminar_imagen':
        $controller = new HabitacionController();
		$id = $params[1];
        $controller->eliminarImagen($id);
        break; 
    case 'comentarios_adm':
            $controller = new ComentarioController();
            $controller->listarComentarios();
            break;    
     
    default:
        $error=new ErrorHelper();
        $error->recursoNoExiste('home');
        break;
}
