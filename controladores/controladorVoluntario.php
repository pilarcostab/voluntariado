<?php
require_once './modelos/modeloVoluntario.php';
require_once './vistas/vistaVoluntario.php';
class controladorVoluntario
{
    private $modelo;
    private $vista;

    public function __construct()
    {
        $this->modelo = new modeloVoluntario();
        $this->vista = new vistaVoluntario();
    }

    public function showHome()
    {
        $this->vista->showHome();
    }

    public function sedes() {
        $sedes = $this->modelo->obtenerCategorias();  // Obtener las sedes desde el modelo
        include 'C:/xampp/htdocs/web2/tpe2/voluntariado/vistas/categorias.phtml';  // Llamar a la vista
    }

    // Función para mostrar los ítems (voluntarios) de una categoría (sede)
    public function mostrarVoluntarios($id_sede) {
        $voluntarios = $this->modelo->obtenerVoluntariosPorCategoria($id_sede); // Corregido el uso del modelo
        if ($voluntarios) {
            include 'C:/xampp/htdocs/web2/tpe2/voluntariado/vistas/voluntario.por.categoria.phtml'; // Incluye la vista para mostrar los voluntarios
        } else {
            echo "No se encontraron voluntarios para la sede con ID:" . $id_sede;
        }
    }    
}
