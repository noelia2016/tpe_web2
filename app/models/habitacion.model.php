<?php

class HabitacionModel {
    
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
     * Devuelve todas las habitaciones de la base de datos.
     */
    function obtenerHabitaciones() {

        // Se envia la consulta
        $query = $this->db->prepare('SELECT * FROM habitacion');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $habitaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $habitaciones;
    }

}