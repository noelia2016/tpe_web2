<?php
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

    function login($user) {
        session_start();
        $_SESSION['ID_USER'] = $user->id;
        $_SESSION['EMAIL_USER'] = $user->email;
        $_SESSION['USER'] = $user->user;
    }


}
