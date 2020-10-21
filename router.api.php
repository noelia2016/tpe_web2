<?php
require_once 'libs/Route.php';
require_once 'app/api/api.comentario.controller.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('comentarios', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('nuevo_comentario', 'POST', 'ApiComentarioController', 'crearComentario');
$router->addRoute('comentario/:ID', 'GET', 'ApiComentarioController', 'obtenerComentario');
$router->addRoute('eliminar_comentario/:ID', 'DELETE', 'ApiComentarioController', 'eliminarComentario');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
