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
    
    /** 
     *  Muestra la categoria elegida con sus detalles y habitaciones que posee asociadas
    **/
    function mostrarCategoria ($categoria, $habitaciones){
        
        $smarty = new Smarty();
        $smarty->debugging = true;
        $smarty->assign('categoria', $categoria);
        $smarty->assign('habitaciones', $habitaciones);
        $smarty->display('templates/ver_categoria.tpl');

    }
    
    /**
     * Imprime los detalles de una habitacion
     */
    function mostrarDetalleHabitacion($habitacion) {
        
        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);
    
        $smarty->display('templates/ver_habitacion.tpl');
    }
    
    /**
     * Muestra pantalla de error para el visitante
     */
    function pantallaDeError($camino) {
        
        $smarty = new Smarty();
        
        $smarty->assign('camino', $camino);

        $smarty->assign('mensaje', "Esta intentando ingresar a una seccion no valida.");
    
        $smarty->display('templates/notFound.tpl');
    }
    
}