<?php

require_once('libs/smarty/libs/Smarty.class.php');

class HabitacionView {
 
    /**
     * Imprime los detalles de una habitacion
     */
    function mostrarDetalleHabitacion($habitacion) {
        
        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);
          
        $smarty->display('templates/ver.habitacion.tpl');
    }
    

}