<?php


class vistaVoluntario
{
    public function __construct() {}

    public function mostrarHome($voluntarios)
    {
        require_once './templates/header.phtml';
        require_once './templates/index.phtml';
        require_once './templates/footer.phtml';
    }
}
