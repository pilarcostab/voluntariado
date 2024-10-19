<?php
require_once './controladores/controladorVoluntario.php';
require_once './controladores/controladorSede.php';
require_once './controladores/controladorAutenticacion.php';
require_once './libs/response.php';
require_once './middlewares/middleSesion.php';
require_once './middlewares/middleVerificacion.php';
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';
$res = new Response();
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
    case 'agregarVoluntario':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->agregarVoluntario();
        break;
    case 'eliminarVoluntario':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorAdmin = new controladorVoluntario();
        $controladorAdmin->EliminarVoluntario($params[1]);
        break;
    case 'editarVoluntario':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->editarVoluntario($params[1]);
        # code...
        break;
    case 'editarV':
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->editar($params[1]);
        break;
    default:
        # code...
        break;
}
