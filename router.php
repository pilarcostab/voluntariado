<?php
require_once './controladores/controladorVoluntario.php';
require_once './controladores/controladorSede.php';

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
        $controladorSede = new controladorSede();
        $controladorSede->sedes();
        break;
    case 'voluntario':
        $controladorSede = new controladorSede();
        $controladorSede->mostrarVoluntarios($params[1]);
        break;
    default:
        # code...
        break;
}
