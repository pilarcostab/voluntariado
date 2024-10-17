<?php

class modeloVoluntario
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=voluntariado;charset=utf8', 'root', '');
    }

    public function obtenerVoluntarios()
    {
        $query = $this->db->prepare('
        SELECT v.id_voluntario, v.nombre, v.apellido, v.id_sede, s.pais AS sede_nombre
        FROM voluntario v
        JOIN sede s ON v.id_sede = s.id_sede');
        $query->execute();
        $voluntarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $voluntarios;
    }

    public function obtenerVoluntarioEmail($email)
    {
        $query = $this->db->prepare('SELECT * FROM voluntario WHERE email= ?');
        $query->execute([$email]);
        $voluntario = $query->fetch(PDO::FETCH_OBJ);
        return $voluntario;
    }
}
