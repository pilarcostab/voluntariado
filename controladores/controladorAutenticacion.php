<?php
require_once './vistas/vistaAutenticacion.php';
require_once './modelos/modeloVoluntario.php';

class controladorAutenticacion {
    private $modelo;
    private $vista;

    public function __construct()
    {
        $this->modelo = new modeloVoluntario();
        $this->vista = new vistaAutenticacion();
    }

    public function mostrarFormularioLogin()
    {
        $this->vista->mostrarFormularioLogin();
    }
    public function mostrarFormularioSignup()
    {
        $this->vista->mostrarFormularioSignup();
    }

    public function registrarse() {}

    public function ingresar() {}

    public function logout() {
        session_start();  
        session_destroy();  
        header('Location: ' . BASE_URL . 'home'); 
        exit();
    }


}
