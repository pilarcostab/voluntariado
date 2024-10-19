<?php


class vistaVoluntario
{
    public function __construct() {}

    public function mostrarHome($voluntarios, $sedes)
    {
        require_once './templates/header.phtml';
        require_once './templates/index.phtml';
        require_once './templates/footer.phtml';
    }
    public function mostrarError($error)
    {
        require_once './templates/error.phtml';
    }

    public function mostrarFormulario($voluntario, $sedes)
    {
        require_once './templates/header.phtml';
        require_once './templates/formAdminModificar.phtml';
        require_once './templates/footer.phtml';
    }
}
