<?php

require_once('libs/smarty/libs/Smarty.class.php');

class HabitacionView {
 
    /**
     * Imprime los detalles de una habitacion
     */
    function mostrarDetalleHabitacion($habitacion, $mostrar) {
        
        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);
        $smarty->assign('mostrar', $mostrar);
        $smarty->assign('id', $habitacion->id);
    
        $smarty->display('templates/ver.habitacion.tpl');
    }
    

}