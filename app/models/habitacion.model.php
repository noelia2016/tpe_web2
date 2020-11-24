<?php

include_once 'app/helpers/DB.helper.php';

class HabitacionModel {
    
    private $db;
    private $dbHelper;
    
    function __construct() {
        
        $this->dbHelper = new DBHelper();
        // me conecto a la BD
        $this->db = $this->dbHelper->connect();
    }

    /**
     * Devuelve todas las habitaciones de la base de datos.
     */
    function obtenerHabitaciones() {

        // Se envia la consulta
        $query = $this->db->prepare('SELECT a.id, a.nro, a.capacidad, a.estado, b.nombre as nombre_cat, a.categoria_id, a.comodidades, a.ubicacion
            FROM habitacion a join categoria b on a.categoria_id = b.id 
            order by a.nro');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $habitaciones = $query->fetchAll(PDO::FETCH_OBJ);

        return $habitaciones;
    }
    
    /**
     * Devuelve los datos de una habitación según id pasado como parámetro sin filtros.
     */    
    function mostrarHabitacion($id){
        // Enviar la consulta 
        $query = $this->db->prepare('SELECT * FROM habitacion where id = ?');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $habitacion = $query->fetch(PDO::FETCH_OBJ); 

        return $habitacion;
    }

    /**
     * Devuelve los datos de una habitación según id pasado como parámetro.
     */
    function obtenerHabitacion($id) {

        // Se envia la consulta
        $query = $this->db->prepare('SELECT a.id, a.nro, a.capacidad, a.estado, a.categoria_id, 
        b.nombre as nombre_cat, a.comodidades, a.ubicacion
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
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        $eliminada = $query->rowCount();
        if ($eliminada > 0) {
            $this->eliminarComentariosDeHabitacion($id);
           
        }
        return $eliminada ;

    }
    
    /**
     * Chequea si posee comentarios la habitación según id pasado como parámetro .
     */
    function tieneComentariosAsociados($id){
        
        $query = $this->db->prepare('
        SELECT FROM comentario where habitacion_id = ?'); 
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->rowCount();
    }
    
    /**
     * Eliminar los comentarios de la habitación según id pasado como parámetro .
     */
    function eliminarComentariosDeHabitacion($id){
        
        $query = $this->db->prepare('
        DELETE FROM comentario where habitacion_id = ?'); 
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->rowCount();
    }
    
    /**
     * Actualiza los campos de la habitación según id pasado como parámetro .
     */
    function actualizarHabitacionMdl($id, $nro_habitacion, $estado, $categoria_id, $capacidad, $comodidades, $ubicacion){
         
         //preparar sentencia de actualización datos de la habitación
         $query = $this->db->prepare('UPDATE habitacion 
         SET nro = ?, capacidad = ?, estado = ?, categoria_id = ?, comodidades = ?, ubicacion = ? 
         WHERE id = ?');
         //ejecutar sentencia de insert con los valores de los parámetros
         $query->execute([$nro_habitacion, $capacidad, $estado, 
         $categoria_id, $comodidades, $ubicacion, $id]);   
         return $query->fetch(PDO::FETCH_OBJ);

    }
    
    /**
     * Inserto una nueva habitacion.
     */
    function insertarHabitacionMdl($nro_habitacion, $estado, $categoria_id, $capacidad, $comodidades, $ubicacion){
        //preparar sentencia de insert de la nueva habitación
        $query = $this->db->prepare('INSERT INTO habitacion (nro, capacidad, estado, categoria_id, comodidades, ubicacion )
        VALUES ( ? , ? , ? , ? , ? , ? )');
        
        //ejecutar sentencia de insert con los valores de los parámetros
        $query->execute([$nro_habitacion, $capacidad, $estado, $categoria_id, $comodidades, $ubicacion]);
        
        //Obtengo y devuelo el ID de la nueva habitación
        return $this->db->lastInsertId();

    }
    
     /**
     * Inserto una nueva imagen para la habitacion.
     */
    function guardarImagen($hab, $imagen){
        
        $pathImg = null;
        if ($imagen)
            $pathImg = $this->uploadImage($imagen);
        $query = $this->db->prepare('INSERT INTO imagen_galeria (imagen, habitacion_id )
        VALUES ( ? , ?)');
        //ejecutar sentencia de insert con los valores de los parámetros
        $query->execute([$pathImg, $hab]);
        
        //Obtengo y devuelo el ID de la nueva habitación
        return $this->db->lastInsertId();
    }
    
    /**
     * Nombre unico para la imagen
     */
    private function uploadImage($image){
        $target = 'img/habitacion/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }
    
    /**
     * Obtengo todas las imagenes de la habitacion.
     */
    function obtenerImagenes($id){
        
        $query = $this->db->prepare('SELECT * FROM imagen_galeria where habitacion_id = ?');
        $query->execute([$id]);

        // Obtengo la respuesta con un fetchAll 
        $imagenes = $query->fetchAll(PDO::FETCH_OBJ);

        return $imagenes;
    }
	
	/**
     * Obtengo todas las imagenes cargadas
     */
    function obtenerTodasLasImagenes(){
        
        $query = $this->db->prepare('SELECT ig.id as id_img, ig.imagen, h.id, h.nro as nro_hab FROM imagen_galeria as ig inner join habitacion as h on ig.habitacion_id = h.id');
        $query->execute();

        // Obtengo la respuesta con un fetchAll 
        $imagenes = $query->fetchAll(PDO::FETCH_OBJ);

        return $imagenes;
    }
	
	/**
     * Elimino un imagen de la habitacion
     */
    function eliminarImagenDeHab($id){
		$query = $this->db->prepare('DELETE FROM imagen_galeria where id = ?'); 
        $query->execute([$id]);
        // devuelve numero de columnas afectadas a la eliminacion
        return $query->rowCount();
	}

  
}