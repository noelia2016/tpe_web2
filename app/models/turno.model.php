<?php

class TurnoModel
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
        $db = new PDO('mysql:host=localhost;' . 'dbname=db_medicos;charset=utf8', 'unicen2020', 'bDUGAV6c0rgJVPdT');
        return $db;
    }

    
    /**
     * Actualiza los datos de un turno según id pasado como parámetro y los datos a actualizar
     */
    function actualizarTurno($id, $mes, $dia, $hora, $minuto)
    {
        $query = $this->db->prepare('
        UPDATE turno SET mes = ?, dia = ? , hora = ? , minuto = ?
            WHERE id = ?');
        $query->execute([$mes, $dia, $hora, $minuto, $id]);
        if ($query == TRUE){
           return TRUE;
       }else{
           return FALSE;
       }
    }
    
    
}
