<?php

class UsuarioView {

     
    /*  Muestra el formulario de login */
    
    function login($mensaje) {
        
        $smarty = new Smarty();   
        
        $smarty->assign('mensaje', $mensaje);
        
        $smarty->display('templates/form.login.tpl');
    }
    
    /* 
        Muestra el formulario para registrarse como usuario 
    */
    function registrar($mensaje) {
        
        $smarty = new Smarty();
        
        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/form.registro.tpl');

    }
    
    /* 
        Muestra el formulario para cambiar contraseña 
    */
    function actualizarPass($mensaje) {
        
        $smarty = new Smarty();
        
        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/form.actualizar.pass.tpl');

    }
    
}