<?php

require_once('libs/smarty/libs/Smarty.class.php');

class HabitacionView {
 
    /**
     * Imprime los detalles de una habitacion
     */
    function mostrarDetalleHabitacion($habitacion, $mostrar, $id) {
        
        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);
        $smarty->assign('mostrar', $mostrar);
        $smarty->assign('id', $id);
    
        $smarty->display('templates/ver.habitacion.tpl');
    }
    

}