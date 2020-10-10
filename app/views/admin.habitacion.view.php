<?php
require_once('libs/smarty/libs/Smarty.class.php');

class AdminHabitacionView
{
    function mostrarHabitaciones($habitaciones)
    {
        $smarty = new Smarty(); 
        $smarty->assign('habitaciones', $habitaciones);
        $smarty->display('templates/admin.lista.hab.tpl');       
    }

    function editarHabitacionVista($habitacion,$categoria)
    {   

        $smarty = new Smarty(); 
        $smarty->assign('habitacion', $habitacion);
        //Completar opciones de estados de habitación posibles
        $smarty->assign('estado', array('ocupada','disponible','reservada'));
        //Indicar cual es el estado de la habitación que vamos a mostrar
        $smarty->assign('estado_selec', $habitacion->estado);
        $smarty->display('templates/admin.form.hab.tpl'); 
    } 
    
    function altaHabitacionVista()
    {   
        $smarty = new Smarty(); 
        //Completar opciones de estados de habitación posibles
        $smarty->assign('estado', array('ocupada','disponible','reservada'));
        $smarty->display('templates/admin.form.hab.tpl'); 

    } 
}
