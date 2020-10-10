<?php

require_once('libs/smarty/libs/Smarty.class.php');

class HomeView {

    /** 
        Muestra la pagina principal del sitio para el visitante 
    **/
    function mostrarHome($categorias) {
        
        // instancio el smarty
        $smarty = new Smarty();
        
        // asigno las categorias para usarla en la vista
        $smarty->assign('categorias', $categorias);
        
        // llamo al tpl que necesito
        $smarty->display('templates/home.tpl');

    }
    
    /** 
        Muestra la pagina de servicios para el visitante 
    **/
    function mostrarServicios() {
        
        
        $smarty = new Smarty();
    
        $smarty->display('templates/servicios.tpl');

    }
    
    /** 
        Muestra la pagina de contactos para poder comunicarse con nosotros 
    **/
    function mostrarContacto() {
        
        
        $smarty = new Smarty();
    
        $smarty->display('templates/contacto.tpl');

    }
    
}