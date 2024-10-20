<?php
require_once './config/config.php';

class modeloVoluntario
{
    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=voluntariado;charset=utf8', 'root', '');
    }

    public function obtenerVoluntarios()
    {
        $query = $this->db->prepare('SELECT * FROM voluntario');
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

    public function validarUsuario($email)
    {
        $query = $this->db->prepare('SELECT * FROM voluntario WHERE email= ?');
        $query->execute([$email]);
        $voluntario = $query->fetch(PDO::FETCH_OBJ);
        if ($voluntario->nombre === 'webadmin') {
            return true;
        }
        return false;
    }

    public function obtenerVoluntario($id)
    {
        $query = $this->db->prepare('SELECT * FROM voluntario WHERE id_voluntario= ?');
        $query->execute([$id]);
        $voluntario = $query->fetch(PDO::FETCH_OBJ);
        return $voluntario;
    }

    public function obtenerSedes()
    {
        $query = $this->db->prepare('SELECT * FROM sede');
        $query->execute();
        $sedes = $query->fetchAll(PDO::FETCH_OBJ);
        return $sedes;
    }

    public function agregarVoluntario($nombre, $apellido, $id_sede)
    {
        $query = $this->db->prepare('INSERT INTO voluntario(nombre,apellido,id_sede) VALUES (?,?,?)');
        $query->execute([$nombre, $apellido, $id_sede]);
    }

    public function eliminarVoluntario($id)
    {
        $query = $this->db->prepare('DELETE FROM voluntario WHERE id_voluntario = ?');
        $query->execute([$id]);
    }

    public function editarVoluntario($nombre, $apellido, $id_sede, $id)
    {
        $query = $this->db->prepare('UPDATE voluntario SET nombre= ?, apellido= ?,  id_sede= ?  WHERE id_voluntario= ?');
        $query->execute([$nombre, $apellido, $id_sede, $id]);
        var_dump($nombre, $apellido, $id, $id_sede);
    }
}
