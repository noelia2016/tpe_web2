<?php

class UsuarioModel {
    
    private $db;

    function __construct() {
         // Abro la conexión
        $this->db = $this->connect();
    }

    /**
     * Abre conexión a la base de datos;
     */
    private function connect() {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_hotel;charset=utf8', 'unicen2020', 'bDUGAV6c0rgJVPdT');
        return $db;
    }

    /**
     * Devuelve todas los usuarios que existen.
     */
    function obtenerUsuarios() {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM usuario');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ); 

        return $usuarios;
    }
    
    /**
     * Inserta un nuevo usuario.
     */
    function insertar ($nombre, $apellido, $sexo, $fecha_nac, $email, $user, $password){
        
        // guardo la contraseña encriptandola
        $hash = password_hash($password, PASSWORD_DEFAULT); 
        var_dump($hash);
        /* el usuario a insertar simpre va hacer usuario normal ... el unico que lo puede modificar es el administrador para que sea usuario administrador */
        $query = $this->db->prepare('INSERT INTO usuario (nombre, apellido, sexo, fecha_nac, email, user, password, habilitado, es_administrador) VALUES (?,?,?,?,?,?,?,?,?)');
        $query->execute([$nombre, $apellido, $sexo, $fecha_nac, $email, $user, $hash, 1, 0]);

        // Obtengo y devuelo el ID del usuario recientemente creado
        return $this->db->lastInsertId();
        
   }
    
    /**
     * Elimina el usuario
     */
    function eliminar($id) {  
  
        $query = $this->db->prepare('DELETE FROM usuario WHERE id = ?');
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->rowCount();
    }
    
    /**
     * Deshabilita el usuario temporalmete 
     */
    function bloquear($id, $accion) {
        
       $query = $this->db->prepare('UPDATE usuario SET habilitado = ? WHERE id = ?');
       $query->execute([$id, $accion]);
       return $query->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Verifica los datos del inicio de usuario
     */

    function verificar($user) {  
  
        $query = $this->db->prepare('SELECT * FROM usuario WHERE user = ?');
        $query->execute([$user]);
        
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
    /**
     * Verifica los datos del usuario para cambiar password
     */
    function verificarDatos($email) {  
  
        $query = $this->db->prepare('SELECT * FROM usuario WHERE email = ?');
        $query->execute([$email]);
        
        return $query->fetch(PDO::FETCH_OBJ);
    }
    
     /**
     * Deshabilita el usuario temporalmete 
     */
    function actualizarPass($passwordNueva,$id) {

       $query = $this->db->prepare("UPDATE usuario SET password = ? WHERE id = ?");
       $query->execute([md5($passwordNueva),$id]);
       if ($query == TRUE){
           return TRUE;
       }else{
           return FALSE;
       }
    }
    
    /**
     * Verifica si el usuario elegido ya se encuentra registrado
     */
    function existe_user($user) {  
  
        $query = $this->db->prepare('select * FROM usuario WHERE usuario = ?');
        $query->execute([$user]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->rowCount();
    }
    
    /**
     * Verifica si el usuario elegido ya se encuentra registrado
     */
    function obtener_usuario($id) {  
  
        $query = $this->db->prepare('select * FROM usuario WHERE id = ?');
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->fetch(PDO::FETCH_OBJ);
    }

}