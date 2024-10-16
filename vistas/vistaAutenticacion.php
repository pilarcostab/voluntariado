<?php


class vistaAutenticacion
{
    public function __construct() {}

    public function mostrarFormularioLogin()
    {
        require_once './templates/formLog-in.phtml';
    }

    public function mostrarFormularioSignup()
    {
        require_once './templates/formSign-up.phtml';
    }
}
