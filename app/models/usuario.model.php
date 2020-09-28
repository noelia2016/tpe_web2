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
    function getAll() {

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
    function insertar($nombre, $apellido, $sexo, $fecha_nac, $email, $user, $password){
        
        $query = $this->db->prepare('INSERT INTO usuario (nombre, apellido, sexo, fecha_nac, email, users, password, habilitado) VALUES (?,?,?,?,?,?,?,?)');
        $query->execute([$nombre, $apellido, $sexo, $fecha_nac, $email, $user, md5($password), 1]);

        // Obtengo y devuelo el ID del usuario recientemente creado
        return $this->db->lastInsertId();
    }
    
    /**
     * Elimina el usuario
     */
    function remove($id) {  
  
        $query = $this->db->prepare('DELETE FROM usuario WHERE id = ?');
        $query->execute([$id]);
    }
    
    /**
     * Deshabilita el usuario temporalmete 
     */
    function bloquear($id) {
       $query = $this->db->prepare('UPDATE usuario SET habilitado = 0 WHERE id = ?');
       $query->execute([$id]);
    }
    
    /**
     * Elimina el usuario
     */
    function verificar($user, $pass) {  
  
        $query = $this->db->prepare('SELECT * FROM usuario WHERE user = ? and password = ?');
        $query->execute([$user, md5($pass)]);
    }

}