<?php
require_once './modelos/modeloSede.php';
require_once './vistas/vistaSedes.php';

class controladorSede {
    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new modeloSede();
        $this->vista = new vistaSedes();
    }

    public function sedes() {
        $sedes = $this->modelo->obtenerCategorias();
        $this->vista->mostrarSedes($sedes);
    }

    public function mostrarVoluntarios($id_sede) {
        $voluntarios = $this->modelo->obtenerVoluntariosPorCategoria($id_sede);
        $this->vista->mostrarVoluntariosPorSede($voluntarios, $id_sede);
    }

    public function agregarSede() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $this->modelo->agregarSede($pais, $ciudad);
            header('Location: ' . BASE_URL . 'sedes');
            exit();
        } else {
            $sedes = $this->modelo->obtenerCategorias(); 
            $this->vista->mostrarFormularioAgregarSede($sedes);
        }
    }

    public function mostrarFormularioEditarSede($id_sede) {
        $sede = $this->modelo->obtenerSedePorId($id_sede);
        if ($sede) {
            $this->vista->mostrarFormularioEditarSede($sede);
        } else {
            $this->vista->mostrarError("No se encontró la sede con ID: " . $id_sede);
        }
    }

    public function editarSede($id_sede) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pais = $_POST['pais'];
            $ciudad = $_POST['ciudad'];
            $this->modelo->editarSede($id_sede, $pais, $ciudad);
            header('Location: ' . BASE_URL . 'sedes');
            exit();
        }
    }

    public function eliminarSede() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_sede'])) {
            $id_sede = $_POST['id_sede'];
            $totalVoluntarios = $this->modelo->contarVoluntariosPorSede($id_sede);
            if ($totalVoluntarios == 0) {
                $this->modelo->eliminarSede($id_sede);
                header('Location: ' . BASE_URL . 'sedes');
                exit();
            } else {
                echo "<p>No se puede eliminar la sede porque tiene voluntarios asociados.</p>";
            }
        }
    }
}
