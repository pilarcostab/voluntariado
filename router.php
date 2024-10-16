<?php
require_once './controladores/controladorVoluntario.php';
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) {
    case 'home':
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->showHome();
        break;
    case 'sedes':
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->sedes();
        break;
    case 'voluntario':
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->mostrarVoluntarios($params[1]);
        break;
    default:
        # code...
        break;
}
