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
       
        $smarty->assign('habitacion', $habitacion);
        //asignar las categorias y mostrar seleccionada
        $smarty->assign('categorias', $lista_cat); 
        $smarty->assign('categoria_sel', $habitacion->categoria_id);
        //Completar opciones de estados de habitación posibles
        $smarty->assign('estado', array('ocupada','disponible','reservada'));
        //Indicar cual es el estado de la habitación que vamos a mostrar
        $smarty->assign('estado_selec', $habitacion->estado);
        $smarty->display('templates/admin.form.edit.habit.tpl'); 
    }

    function altaHabitacionVista($lista_cat)
    {   
        $smarty = new Smarty(); 
        //Completar opciones de estados de habitación posibles
        $smarty->assign('categorias', $lista_cat); 
        $smarty->assign('estado', array('ocupada','disponible','reservada'));
        $smarty->display('templates/admin.form.alta.habit.tpl'); 

    }
    
    function mostrarMensajeActuHabitacion($habitaciones, $mensaje, $estado){
        $smarty = new Smarty(); 
        if ($estado){
            $smarty->assign('mensajeBien', $mensaje);
        }
        else{
            $smarty->assign('mensaje', $mensaje);
        }
        $smarty->assign('habitaciones', $habitaciones);
        $smarty->display('templates/admin.lista.hab.tpl');
    }
    
    /**
       * Muestra el fomulario para cargar imagen para la galeria de una habitacion
    */
    function cargarImagen($mensaje = null, $habitaciones, $imagenes) {
        
        $smarty = new Smarty();
        
        $smarty->assign('habitaciones', $habitaciones);
		 $smarty->assign('imagenes', $imagenes);
        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/form.cargar.imagen.tpl');
    }
    

}
