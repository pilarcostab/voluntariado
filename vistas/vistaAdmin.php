<?php
class vistaAdmin
{
    public function __construct() {}

    public function mostrarHome($voluntarios)
    {
        require_once './templates/homeAdmin.phtml';
    }

    public function mostrarError($error)
    {
        require_once './templates/error.phtml';
    }

    public function mostrarFormulario($voluntario)
    {
        require_once './templates/header.phtml';
        require_once './templates/formAdminModificar.phtml';
        require_once './templates/footer.phtml';
    }
}
