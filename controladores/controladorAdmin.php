<?php
require_once './vistas/vistaAdmin.php';
require_once './modelos/modeloAdmin.php';
class controladorAdmin
{
    private $vista;
    private $modelo;

    public function __construct()
    {
        $this->vista = new vistaAdmin();
        $this->modelo = new modeloAdmin();
    }

    public function homeAdmin()
    {
        $voluntarios = $this->modelo->obtenerVoluntarios();
        $this->vista->mostrarHome($voluntarios);
    }

    public function agregarVoluntario()
    {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            $this->vista->mostrarError('ingrese voluntario');
            return;
        }
        if (!isset($_POST['apellido']) || empty($_POST['apellido'])) {
            $this->vista->mostrarError('ingrese apellido');
            return;
        }
        if (!isset($_POST['sede']) || empty($_POST['sede'])) {
            $this->vista->mostrarError('ingrese sede');
            return;
        }

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sede = $_POST['sede'];
        $id_sede = $this->modelo->obtenerSedeId($sede);

        $this->modelo->agregarVoluntario($nombre, $apellido, $id_sede);
        header('Location: ' . BASE_URL . 'homeAdmin');
    }

    public function eliminarVoluntario($id)
    {
        $this->modelo->eliminarVoluntario($id);

        header('Location: ' . BASE_URL . 'homeAdmin');
    }

    public function editarVoluntario($id)
    {
        $voluntario = $this->modelo->obtenerVoluntario($id);
        $this->vista->mostrarFormulario($voluntario);
    }

    public function editar()
    {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            $this->vista->mostrarError('ingrese voluntario');
            return;
        }
        if (!isset($_POST['apellido']) || empty($_POST['apellido'])) {
            $this->vista->mostrarError('ingrese apellido');
            return;
        }
        if (!isset($_POST['sede']) || empty($_POST['sede'])) {
            $this->vista->mostrarError('ingrese sede');
            return;
        }
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sede = $_POST['sede'];
        $id_sede = $this->modelo->obtenerSedeId($sede);
        $this->modelo->editarVoluntario($nombre, $apellido, $id_sede, $id);
        header('Location: ' . BASE_URL . 'homeAdmin');
    }
}
