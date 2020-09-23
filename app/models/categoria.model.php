<?php

class CategoriaModel {
    
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
     * Devuelve todas las categorias de habitaciones que existen.
     */
    function getAll() {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); 

        return $categorias;
    }

}