<?php
require_once 'libs/Route.php';
require_once 'app/api/api.comentario.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ApiComentarioController', 'obtenerComentariosDeHabitacion');
$router->addRoute('comentario/:ID', 'GET', 'ApiComentarioController', 'obtenerComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiComentarioController', 'eliminarComentario');

$router->addRoute('comentarios', 'POST', 'ApiComentarioController', 'insertarComentario');

// ruta por defecto si no encuentra una ruta que coincida
$router->setDefaultRoute('ApiComentarioController','show404');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
