<?php

require_once('libs/smarty/libs/Smarty.class.php');

class HabitacionView {

    /**
     * Imprime todas las habitaciones
     */
    function mostrarHabitaciones($habitaciones) {
        
       /* include 'templates/header.php';
        echo "<ul class='list-group mt-5'>";
        foreach($habitaciones as $hab) {
            echo "<li class='list-group-item'>
                    $hab->nro | $hab->capacidad | $hab->estado                    
                </li>";
        }
        echo "</ul>";

    
        include 'templates/footer.php';*/
    }
    
    /**
     * Imprime los detalles de una habitacion
     */
    function mostrarDetalleHabitacion($habitacion) {
        
        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);
    
        $smarty->display('templates/ver_habitacion.tpl');
    }
    

}