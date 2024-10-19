<?php
class vistaSedes {
    public function __construct() {}

    public function mostrarSedes($sedes) {
        require_once './templates/categorias.phtml';
    }

    public function mostrarVoluntariosPorSede($voluntarios, $id_sede) {
        require_once './templates/voluntario.por.categoria.phtml';
    }

    public function mostrarFormularioEditarSede($sede) {
        require_once './templates/formularioEditarSede.phtml';
    }

    public function mostrarFormularioAgregarSede($sedes) {
        require_once './templates/editarSede.phtml';
    }

    public function mostrarError($mensaje) {
        echo "<p>Error: $mensaje</p>";
    }
}