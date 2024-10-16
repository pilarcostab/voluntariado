<?php

class modeloVoluntario{
    private $db;

    public function __construct(){
        $this->db= new PDO('mysql:host=localhost;'.'dbname=voluntariado;charset=utf8', 'root', '');
    }
    
    // Obtener todas las sedes (categorías)
    public function obtenerCategorias() {
        $query = $this->db->prepare('SELECT * FROM sede');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Obtener los voluntarios de una sede específica (categoría)
    public function obtenerVoluntariosPorCategoria($id_sede) {
        $query = $this->db->prepare("SELECT * FROM voluntario WHERE id_sede = ?");
        $query->execute([$id_sede]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }    
}