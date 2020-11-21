<?php
// no muestra las notificaciones de php en el navegador
//error_reporting(0);
class SesionHelper {
    public function __construct() {
        
    }

    /**
     * Barrera de seguridad para usuario logueado
     */
    function checkLogged() {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            header("Location: " . BASE_URL . "login");
            die(); 
        }
    }   
    
    /**
     * Cierre de sesion de usuario
     */
    function logout() {
        session_start();
        session_destroy();
        header("Location: " . BASE_URL . 'login');
    }    

    /**
     * Registra las variables de inicio de sesion de usuario
     */
    function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['EMAIL_USER'] = $user->email;
        $_SESSION['USER'] = $user->user;
        // para poder saber el tipo de usuario que es y controlar permisos
        $_SESSION['TIPO_USER'] = $user->es_administrador;
        $_SESSION['LOGUEADO'] = true;

    }
    
    /**
     * Verifica que el usuario logueado es usuario no administrador
     */
    function esta_logueadoUserNormal(){
        
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        
        // verifico que sea usuario comun
        if ((isset($_SESSION['LOGUEADO'])) && ($_SESSION['LOGUEADO'] == true) 
        && (isset($_SESSION['TIPO_USER'])) && ($_SESSION['TIPO_USER'] == 0)) {
            return TRUE; 
        }else{
            return FALSE;
        }
    }

     /**
     * Verifica que el usuario logueado es administrador
     */
    function esta_logueadoAdministrador(){
        
         if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        // verifico que sea usuario administrador para ingresar a esa seccion sino lo redirecciono
        if ((isset($_SESSION['LOGUEADO']) && ($_SESSION['LOGUEADO'] == true) 
        && isset($_SESSION['TIPO_USER']) && $_SESSION['TIPO_USER'] == 1)) 
        {
            return TRUE; 
        }else{
            // si no es administrador lo vuelvo a la home normal
            header("Location: " . BASE_URL); 
            return false;
        }
    }
    
    /**
     * Devuelve el usuario que esta logueado
     */
    function obtenerTipoUsuario(){
        
         if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        // verifico que sea usuario administrador para ingresar a esa seccion sino lo redirecciono
        if ((isset($_SESSION['LOGUEADO']) && ($_SESSION['LOGUEADO'] == true) 
        && isset($_SESSION['TIPO_USER']) )) 
        {
            return $_SESSION['TIPO_USER']; 
        }
    }
}
