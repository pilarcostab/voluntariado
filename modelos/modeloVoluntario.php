<?php

class modeloVoluntario{
    private $db;

    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=voluntariado;charset=utf8', 'root', '');
    }
    
}