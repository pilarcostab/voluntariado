<?php

class controladorVoluntario{
    private $modelo;
    private $vista;

    public function __construct(){
        $this->modelo= new controladorVoluntario();
        $this->vista= new vistaVoluntario();
    }
    
}