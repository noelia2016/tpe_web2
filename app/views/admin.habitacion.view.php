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

    function editarHabitacionVista($habitacion, $lista_cat)
    {   
        $smarty = new Smarty(); 
        $smarty->debugging = true;
        $smarty->assign('habitacion', $habitacion);
        //asignar las categorias y mostrar seleccionada
        $smarty->assign('categorias', $lista_cat); 
        $smarty->assign('categoria_sel', $habitacion->categoria_id);
        //Completar opciones de estados de habitación posibles
        $smarty->assign('estado', array('ocupada','disponible','reservada'));
        //Indicar cual es el estado de la habitación que vamos a mostrar
        $smarty->assign('estado_selec', $habitacion->estado);
        $smarty->display('templates/admin.form.edit.hab.tpl'); 
    } 

    function altaHabitacionVista($lista_cat)

    {   
        $smarty = new Smarty(); 
        //Completar opciones de estados de habitación posibles
        $smarty->assign('estado', array('ocupada','disponible','reservada'));
        $smarty->display('templates/admin.form.hab.tpl'); 
    }
    
    function editarHabitacionVista($habitacion,$categoria)
    {   

        $smarty = new Smarty();

        $smarty->assign('habitacion', $habitacion);

        //Completar opciones de categorias de habitación 
        $smarty->assign('categorias', $lista_cat); 
        $smarty->display('templates/admin.form.alta.hab.tpl'); 

    } 
}
