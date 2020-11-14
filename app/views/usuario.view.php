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
    function mostrarUsuarios($usuarios, $mensaje = null) {
        
        $smarty = new Smarty();
        
        $smarty->assign('usuarios', $usuarios);
        
        $smarty->assign('mensaje', $mensaje);

        $smarty->display('templates/admin.lista.usu.tpl');

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

    function editarUsuarioVista($usuario){
        $smarty = new Smarty();
        
        $smarty->assign('usuario', $usuario);
        $smarty->debugging = true;

        //Completar opciones de estados de perfil de usuario
        $smarty->assign('txt_habilitado', array('Habilitado','Deshabilitado'));
        $smarty->assign('opc_habilitado', array('1','0'));
        //Completar opciones de tipo de usuario
        $smarty->assign('txt_tipo_usu', array('Administrador','Usuario'));
        $smarty->assign('opc_tipo_usu', array('1','0'));

        $smarty->display('templates/admin.form.edit.usuario.tpl');

    }
    
}