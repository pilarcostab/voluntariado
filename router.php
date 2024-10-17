<?php
require_once './controladores/controladorVoluntario.php';
require_once './controladores/controladorSede.php';
require_once './controladores/controladorAdmin.php';
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
    case 'sedes':
        $controladorSede = new controladorSede();
        $controladorSede->sedes();
        break;
    case 'voluntario':
        $controladorSede = new controladorSede();
        $controladorSede->mostrarVoluntarios($params[1]);
        break;
    case 'logout':
        $controladorAutenticacion = new controladorAutenticacion();
        $controladorAutenticacion->logout();
        break;
    case 'homeAdmin':
        $controladorAdmin = new controladorAdmin();
        $controladorAdmin->homeAdmin();
        break;
    case 'agregarVoluntario':
        $controladorAdmin = new controladorAdmin();
        $controladorAdmin->agregarVoluntario();
        break;
    case 'eliminarVoluntario':
        $controladorAdmin = new controladorAdmin();
        $controladorAdmin->EliminarVoluntario($params[1]);
        break;
    case 'editarVoluntario':
        $controladorAdmin = new controladorAdmin();
        $controladorAdmin->editarVoluntario($params[1]);
        # code...
        break;
    case 'editarV':
        $controladorAdmin = new controladorAdmin();
        $controladorAdmin->editar();
        break;
    default:
        # code...
        break;
}
