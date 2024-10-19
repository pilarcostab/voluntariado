<?php
require_once './controladores/controladorVoluntario.php';
require_once './controladores/controladorSede.php';
require_once './controladores/controladorAutenticacion.php';
require_once './libs/response.php';
require_once './middlewares/middleSesion.php';
require_once './middlewares/middleVerificacion.php';
require_once './vistas/vistaSedes.php';

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
        break;
    case 'editarV':
        $controladorVoluntario = new controladorVoluntario();
        $controladorVoluntario->editar($params[1]);
        break;
    case 'agregarSede':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorSede = new controladorSede();
        $controladorSede->agregarSede();  
        break;
    case 'eliminarSede':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorSede = new controladorSede();
        $controladorSede->eliminarSede();  
        break;
    case 'editarSede':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorSede = new controladorSede();
        if (isset($params[1])) {
            $controladorSede->mostrarFormularioEditarSede($params[1]);  
        } else {
            $vistaSedes = new vistaSedes();
            $vistaSedes->mostrarError("ID de sede no especificado para editar.");
        }
        break;
    case 'editarSedeAction':
        sessionAuthMiddleware($res);
        verifyAuthMiddleware($res);
        $controladorSede = new controladorSede();
        if (isset($params[1])) {
            $controladorSede->editarSede($params[1]);  
        } else {
            $vistaSedes = new vistaSedes();
            $vistaSedes->mostrarError("ID de sede no especificado para editar.");
        }
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}