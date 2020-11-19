<?php

class DBHelper {
    
    public function __construct() {
        $this->host = 'localhost';
        $this->database = 'db_hotel';
        $this->user = 'unicen2020';
        $this->password = 'bDUGAV6c0rgJVPdT';

    }

    public function connect() {
        $db = new PDO("mysql:host={$this->host};"."dbname={$this->database};charset=utf8", 
                        $this->user, $this->password);
        return $db;
    }  
    
}