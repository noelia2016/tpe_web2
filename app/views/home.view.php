<?php

require_once('libs/smarty/libs/Smarty.class.php');

class HomeView {

    /** 
      *  Muestra la pagina principal del sitio para el visitante 
    **/
    function mostrarHome($categorias, $mostrar) {
        
        // instancio el smarty
        $smarty = new Smarty();
        
        // asigno las categorias para usarla en la vista
        $smarty->assign('categorias', $categorias);
        $smarty->assign('mostrar', $mostrar);
        
        // llamo al tpl que necesito
        $smarty->display('templates/home.tpl');

    }
    
    /** 
      *  Muestra la pagina de servicios para el visitante 
    **/
    function mostrarServicios($mostrar) {
        
        
        $smarty = new Smarty();
        $smarty->assign('mostrar', $mostrar);
        $smarty->display('templates/servicios.tpl');

    }
    
    /** 
      *  Muestra la pagina de contactos para poder comunicarse con nosotros 
    **/
    function mostrarContacto($mostrar) {
        
        
        $smarty = new Smarty();
        $smarty->assign('mostrar', $mostrar);
        $smarty->display('templates/contacto.tpl');

    }
    
    /** 
     *  Muestra la categoria elegida con sus detalles y habitaciones que posee asociadas
    **/
    function mostrarCategoria ($categoria, $habitaciones, $mostrar){
        
        $smarty = new Smarty();
        $smarty->debugging = true;
        $smarty->assign('categoria', $categoria);
        $smarty->assign('habitaciones', $habitaciones);
        // para cambiar el menu de la forma que se ve si inicio session o no
        $smarty->assign('mostrar', $mostrar);
        $smarty->display('templates/ver.categoria.tpl');

    }
    
    /** 
     *  Muestra la habitacion elegida con sus detalles y imagenes que posee asociadas en su galeria
    **/
    function mostrarDetalleHabitacion($habitacion, $mostrar, $imagenes = null, $mostrarCarrusel) {
        
        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);
        $smarty->assign('mostrar', $mostrar);
        $smarty->assign('imagenes', $imagenes);
        $smarty->assign('mostrarCarrusel', $mostrarCarrusel);

        $smarty->assign('id', $habitacion->id);
    
        $smarty->display('templates/ver.habitacion.tpl');
    }
    
}