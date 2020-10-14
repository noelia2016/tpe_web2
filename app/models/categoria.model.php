<?php

class CategoriaModel
{

    private $db;

    function __construct()
    {
        // Abro la conexión
        $this->db = $this->connect();
    }

    /**
     * Abre conexión a la base de datos;
     */
    private function connect()
    {
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_hotel;charset=utf8', 'unicen2020', 'bDUGAV6c0rgJVPdT');
        return $db;
    }

    /**
     * Devuelve todas las categorias de habitaciones que existen.
     */
    function obtenerCategorias()
    {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM categoria order by id');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);

        return $categorias;
    }

    /**
     * Devuelve los detalles de una categoria.
     */
    function obtenerCategoria($id)
    {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM categoria where id = ?');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $categoria = $query->fetch(PDO::FETCH_OBJ);

        return $categoria;
    }

    /**
     * Devuelve todas las habitaciones para la categoria elegida.
     */
    function obtenerHabitacionesdeCategoria($id)
    {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM habitacion where categoria_id = ? ');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $habitaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $habitaciones;
    }

    /**
     * Eliminar categoria según id pasado como parámetro 
     */
    function eliminarCategoriaMdl($id)
    {
        $query = $this->db->prepare('
        DELETE FROM categoria where id = ?');
        return $query->execute([$id]);
    }

    function actualizarCategoriaMdl($id, $nombre, $descripcion)
    {
        $query = $this->db->prepare('
        UPDATE categoria SET nombre = ?,  descripcion = ? 
            WHERE id = ?');
        $query->execute([$nombre, $descripcion, $id]);
    }

    function insertarCategoriaMdl($nombre, $descripcion)
    {
        $query = $this->db->prepare('
        INSERT INTO categoria (nombre, descripcion )
                VALUES ( ? , ? )');
        $query->execute([$nombre, $descripcion]);
        return $this->db->lastInsertId();
    }
}
