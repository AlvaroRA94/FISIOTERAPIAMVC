<?php

namespace Controllers;

use MVC\Router;
use Model\Fisioterapeuta;

class FisioterapeutaController
{
    public static function crear(Router $router)
    {
        $errores = Fisioterapeuta::getErrores();

        $fisioterapeuta = new Fisioterapeuta;

        // Ejecución del código después de enviar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear nueva instancia
            $fisioterapeuta = new Fisioterapeuta($_POST['fisioterapeuta']);

            // Validar que no haya campos vacíos
            $errores = $fisioterapeuta->validar();

            // Una vez que no haya Errores
            if (empty($errores)) {
                $fisioterapeuta->guardar();
            }
        }

        $router->render('/fisioterapeutas/crear', [
            'errores' => $errores,
            'fisioterapeuta' => $fisioterapeuta
        ]);
    }
    public static function actualizar(Router $router)
    {
        $errores = Fisioterapeuta::getErrores();

        $id = validarORedireccionar('/admin');

        // Obtener datos del fisioterapeuta a actualizar
        $fisioterapeuta = Fisioterapeuta::find($id);

        // Ejecución del código después de enviar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Asignar los valores
            $args = $_POST['fisioterapeuta'];

            // Sincronizar objeto en memoria
            $fisioterapeuta->sincronizar($args);

            // Validación 
            $errores = $fisioterapeuta->validar();

            if (empty($errores)) {
                $fisioterapeuta->guardar();
            }
        }

        $router->render('/fisioterapeutas/actualizar', [
            'errores' => $errores,
            'fisioterapeuta' => $fisioterapeuta
        ]);
    }
    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Valida el ID
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                // Validación del tipo a eliminar
                $tipo = $_POST['tipo'];

                if (validarTipoContenido($tipo)) {
                    $fisioterapeuta = Fisioterapeuta::find($id);
                    $fisioterapeuta->eliminar();
                }
            }
        }
    }
}
