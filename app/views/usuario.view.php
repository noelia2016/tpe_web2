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
    
     /* 
        Muestra todos los usuarios registrados 
    */
    function mostrarUsuarios($usuarios, $mensaje) {
        
        $smarty = new Smarty();
        
        $smarty->assign('usuarios', $usuarios);
        
        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/listar.usuarios.tpl');

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