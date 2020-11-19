<?php

include_once 'app/helpers/DB.helper.php';

class ComentarioModel
{
    private $db;
    private $dbHelper;

    function __construct()
    {
        
        $this->dbHelper = new DBHelper();
        // me conecto a la BD
        $this->db = $this->dbHelper->connect();
        $this->data = file_get_contents("php://input");
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
     * Devuelve todas los comentarios que existen.
     */
    function obtenerComentarios()
    {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM comentario order by id');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    /**
     * Devuelve un comentario especifico.
     */
    function obtenerComentario($id)
    {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM comentario where id = ? ');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $comentario = $query->fetch(PDO::FETCH_OBJ);

        return $comentario;
    }
    
    /**
     * Devuelve un comentario especifico.
     */
    function obtenerComentarioDeHabitacion($id)
    {

        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM comentario where id_habitacion = ? ');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);

        return $comentarios;
    }

    /**
     * Eliminar un comentario según id pasado como parámetro 
     */
    function eliminarComentario($id)
    {
        $query = $this->db->prepare('
        DELETE FROM comentario where id = ?');
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->rowCount();
    }
    
    /**
     * Actualiza los datos de un comentario según id pasado como parámetro y los datos a actualizar
     */
    function actualizarComentario($id, $puntuacion, $mensaje)
    {
        $query = $this->db->prepare('
        UPDATE comentario SET puntuacion = ?, mensaje = ? 
            WHERE id = ?');
        $query->execute([$puntuacion, $mensaje, $id]);
    }
    
    /**
     * Inserta un nuevo comentario con los datos ingresados por el usuario
     */
    function insertarComentario($puntuacion, $mensaje, $usuario, $habitacion)
    {
        // guardo la fecha actual en una variable
        $fecha= date ("Y-m-d");
        $query = $this->db->prepare('
        INSERT INTO comentario (puntuacion, mensaje, usuario_id, habitacion_id, fecha_realizado )
                VALUES ( ? , ? , ?, ?, ?)');
        var_dump("La query es " + $query);
        $query->execute([$puntuacion, $mensaje, $usuario, $habitacion, $fecha]);
        return $this->db->lastInsertId();
    }
    
}
