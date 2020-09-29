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
    function obtenerCategorias() {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $categorias = $query->fetchAll(PDO::FETCH_OBJ); 

        return $categorias;
    }
    /**
     * Eliminar categoria según id pasado como parámetro 
     */
    function eliminarCategoriaMdl($id) {
        // Se envia la consulta
        $query = $this->db->prepare('
        DELETE FROM categoria where id = ?'); 
        var_dump($query);
        var_dump($id);
        die();
    $query->execute([$id]);
}
    
}