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
        $query = $this->db->prepare('
            SELECT a.id, a.nro, a.capacidad, a.estado, b.nombre as nombre_cat
            FROM habitacion a join categoria b 
            on a.categoria_id = b.id order by a.nro');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $habitaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $habitaciones;
    }

    /**
     * Devuelve los datos de una habitación según id pasado como parámetro.
     */
    function obtenerHabitacion($id) {

        // Se envia la consulta
        $query = $this->db->prepare('
            SELECT a.nro, a.capacidad, a.estado, a.categoria_id, 
                   b.nombre as nombre_cat
            FROM habitacion a 
            join categoria b 
                on a.categoria_id = b.id 
            where a.id = ?');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetch
        $habitacion = $query->fetch(PDO::FETCH_OBJ);

        return $habitacion;
    }
    /**
     * Eliminar habitación según id pasado como parámetro .
     */
    function eliminarHabitacionMdl($id) {
            // Se envia la consulta
            $query = $this->db->prepare('
            DELETE FROM habitacion where id = ?'); 
            var_dump($query);
            var_dump($id);
            die();
        $query->execute([$id]);
    }
    
    function editarHabitacionMdl($id){

    }
}