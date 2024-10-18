<?php
require_once './vistas/vistaAutenticacion.php';
require_once './modelos/modeloVoluntario.php';


class controladorAutenticacion
{
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


    public function ingresar()
    {
        if (!isset($_POST['email']) || empty($_POST['email'])) {
            $this->vista->mostrarFormularioLogin('ingrese un email');
            return;
        }

        if (!isset($_POST['contraseña']) || empty($_POST['contraseña'])) {
            $this->vista->mostrarFormularioLogin('ingrese una contraseña');
            return;
        }

        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];

        $voluntarioFromDb = $this->modelo->obtenerVoluntarioEmail($email);

        if ($voluntarioFromDb && password_verify($contraseña, $voluntarioFromDb->contraseña)) {
            session_start();
            $_SESSION['id_voluntario'] = $voluntarioFromDb->id_voluntario;
            $_SESSION['email'] = $voluntarioFromDb->email;
            $esAdmin = $this->modelo->validarUsuario($email);
            if (!$esAdmin) {
                header('Location: ' . BASE_URL . 'home');
            } elseif ($esAdmin) {
                header('Location: ' . BASE_URL . 'home');
            }
        } else return $this->vista->mostrarFormularioLogin('Credenciales incorrectas');
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
        exit();
    }
}
