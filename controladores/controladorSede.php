<?php
require_once './modelos/modeloSede.php';
require_once './vistas/vistaVoluntario.php';

class controladorSede {
    private $modelo;
    private $vista;

    public function __construct()
    {
        $this->modelo = new modeloSede();
        $this->vista = new vistaVoluntario();
    }

    public function sedes() {
        $sedes = $this->modelo->obtenerCategorias();  // Obtener las sedes desde el modelo
        include './vistas/categorias.phtml';  
    }

    // Función para mostrar los ítems (voluntarios) de una categoría (sede)
    public function mostrarVoluntarios($id_sede) {
        $voluntarios = $this->modelo->obtenerVoluntariosPorCategoria($id_sede); 
        if ($voluntarios) {
            include './vistas/voluntario.por.categoria.phtml'; 
        } else {
            echo "No se encontraron voluntarios para la sede con ID:" . $id_sede;
        }
    }    


//EJEMPLO 
    public function agregarCategoria() {
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');  
            exit();
        }
        //....código para agregar una categoría
    }

    public function eliminarCategoria($id_sede) {
        session_start();
        if (!isset($_SESSION['USER_ID'])) {
            header('Location: ' . BASE_URL . 'login');  // redirige al login si no está logueado
            exit();
        }
        //...código para eliminar una categoría
    }
}
