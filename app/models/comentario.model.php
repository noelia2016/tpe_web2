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

    }

    /**
     * Devuelve todas los comentarios que existen.
     */
    function obtenerComentarios()
    {

        // Enviar la consulta 

        $query = $this->db->prepare('
        SELECT c.id, c.puntuacion, c.mensaje, c.puntuacion, u.id as id_user, 
            u.user, c.fecha_realizado, 
            h.id as id_hab, h.nro as nro_hab 
        FROM comentario as c inner 
        join habitacion as h on h.id = c.habitacion_id 
        inner join usuario as u on u.id = c.usuario_id 
        order by c.fecha_realizado desc, c.id desc');

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
        $query = $this->db->prepare('SELECT c.id, c.puntuacion, c.mensaje, c.puntuacion, u.id as id_user, u.user, c.fecha_realizado, h.id as id_hab, h.nro as nro_hab 
                                     FROM `comentario` as c inner join habitacion as h on h.id = c.habitacion_id inner join usuario as u on u.id = c.usuario_id where c.id = ? order by c.fecha_realizado asc');
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
        $query = $this->db->prepare('SELECT c.id, c.puntuacion, c.mensaje, c.puntuacion, u.id as id_user, u.user, c.fecha_realizado, h.id as id_hab, h.nro as nro_hab FROM `comentario` as c inner join habitacion as h on h.id = c.habitacion_id inner join usuario as u on u.id = c.usuario_id where habitacion_id = ? order by c.fecha_realizado desc');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
        
        if (!empty($comentarios)){
            return $comentarios;
        }else{
            return 0;
        }
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
    function agregarComentario($puntuacion, $mensaje, $usuario, $habitacion)
    {
        // guardo la fecha actual en una variable
        $fecha= date ("Y-m-d");
       
        $query = $this->db->prepare('
        INSERT INTO comentario (puntuacion, mensaje, usuario_id, habitacion_id, fecha_realizado )
                VALUES ( ? , ? , ?, ?, ?)');

        $query->execute([$puntuacion, $mensaje, $usuario, $habitacion, $fecha]);
       
        return $this->db->lastInsertId();
    }
    
}
