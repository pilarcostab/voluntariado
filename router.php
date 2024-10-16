<?php
require_once './controladores/controladorVoluntario.php';
require_once './controladores/controladorAutenticacion.php';
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->mostrarHome();
        break;
    case 'log-in':
        $controladorAutenticacion = new controladorAutenticacion();
        $controladorAutenticacion->mostrarFormularioLogin();
        break;
    case 'login':
        $controladorAutenticacion = new controladorAutenticacion();
        $controladorAutenticacion->ingresar();
        break;
    case 'inscribirse':
        $controladorAutenticacion = new controladorAutenticacion();
        $controladorAutenticacion->mostrarFormularioSignup();
        break;
    case 'signup':
        # code...
        break;
    default:
        # code...
        break;
}
