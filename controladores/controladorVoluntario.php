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
        $sedes = $this->modelo->obtenerSedes();
        $this->vista->mostrarHome($voluntarios, $sedes);
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
        $this->modelo->agregarVoluntario($nombre, $apellido, $sede);
        header('Location: ' . BASE_URL . 'home');
    }

    public function eliminarVoluntario($id)
    {
        $this->modelo->eliminarVoluntario($id);

        header('Location: ' . BASE_URL . 'home');
    }

    public function editarVoluntario($id)
    {
        echo "editarform";
        $voluntario = $this->modelo->obtenerVoluntario($id);
        $sedes = $this->modelo->obtenerSedes();
        $this->vista->mostrarFormulario($voluntario, $sedes);
    }

    public function editar($id)
    {
        echo "entre a la funcion editar";
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

        $this->modelo->editarVoluntario($nombre, $apellido, $sede, $id);

        header('Location: ' . BASE_URL . 'home');
    }
}
