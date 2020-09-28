<?php

class UsuarioView {

    /** 
        Muestra el formulario de login
    **/
    function login() {
        
        $smarty = new Smarty();    
        $smarty->display('templates/form_login.tpl');
    }
    
    /** 
        Muestra el formulario para registrarse como usuario 
    **/
    function registrar() {
        
        $smarty = new Smarty(); 
        $smarty->display('templates/form_registro.tpl');

    }
    
}