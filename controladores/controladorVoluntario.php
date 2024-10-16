<?php
require_once './modelos/modeloVoluntario.php';
require_once './vistas/vistaVoluntario.php';
class controladorVoluntario
{
    private $modelo;
    private $vista;

    public function __construct()
    {
        $this->modelo = new modeloVoluntario();
        $this->vista = new vistaVoluntario();
    }

    public function mostrarHome()
    {
        $voluntarios = $this->modelo->obtenerVoluntarios();
        $this->vista->mostrarHome($voluntarios);
    }
}
