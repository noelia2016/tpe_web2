<?php
    include_once 'app/controllers/habitacion.controller.php';
    include_once 'app/controllers/categoria.controller.php';

    // defino la base url para la construccion de links con urls semánticas
    define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

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
            //$controller = new HabitacionController();
            //$controller->mostrarHabitaciones();
            break;
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
        case 'eliminar_cat':
            $controller = new CategoriaController();
            $id = $params[1];
            $controller->eliminarCategoria($id);
            break;
        case 'editar_cat':
            $controller = new CategoriaController();
            $id = $params[1];
            //$controller->editarCategoria($id);
            break; 
        default:
            echo('404 Page not found');
            break;
    }
