<?php


class vistaAutenticacion
{
    public function __construct() {}

    public function mostrarFormularioLogin($error = '')
    {
        require_once './templates/formLog-in.phtml';
    }
}
