<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;
use Model\Fisioterapeuta;
use Intervention\Image\ImageManagerStatic as Image;

class ServicioController
{
    public static function index(Router $router)
    {
        $servicios = Servicio::all();

        $fisioterapeutas = Fisioterapeuta::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('servicios/admin', [
            'servicios' => $servicios,
            'resultado' => $resultado,
            'fisioterapeutas' => $fisioterapeutas
        ]);
    }

    public static function crear(Router $router)
    {
        $servicio = new Servicio;
        $fisioterapeutas = Fisioterapeuta::all();

        // Array de validación de formulario -> aviso de ERRORES
        $errores = Servicio::getErrores();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva Instancia */
            $servicio = new Servicio($_POST['servicio']);

            /** SUBIDA DE ARCHIVOS */

            // Generar nombre único para las imagenes
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Realiza un Resize a la imagen con la librería Intervention
            if ($_FILES['servicio']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['servicio']['tmp_name']['imagen'])->fit(800, 600);
                $servicio->setImagen($nombreImagen);
            }

            // Validación, Array de Errores debe estar vacío
            $errores = $servicio->validar();

            if (empty($errores)) {

                // Crear la carpeta para subir las imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                if (isset($image)) {
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }

                // Guarda en la BBDD
                $servicio->guardar();
            }
        }

        $router->render('servicios/crear', [
            'servicio' => $servicio,
            'fisioterapeutas' => $fisioterapeutas,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');

        $servicio = Servicio::find($id);

        $fisioterapeutas = Fisioterapeuta::all();

        $errores = Servicio::getErrores();

        // Método POST para actualizar
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['servicio'];

            $servicio->sincronizar($args);

            // Validación
            $errores = $servicio->validar();

            // Subida de Archivos
            // Generar nombre único para las imagenes
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            if ($_FILES['servicio']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['servicio']['tmp_name']['imagen'])->fit(800, 600);
                $servicio->setImagen($nombreImagen);
            }

            // Revisar que el Array de Errores esté vacío
            if (empty($errores)) {
                if ($_FILES['servicio']['tmp_name']['imagen']) {
                    // Guardar la imagen
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $servicio->guardar();
            }
        }

        $router->render('/servicios/actualizar', [
            'servicio' => $servicio,
            'errores' => $errores,
            'fisioterapeutas' => $fisioterapeutas
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Validación ID
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);

                if ($id) {

                    $tipo = $_POST['tipo'];

                    if (validarTipoContenido($tipo)) {
                        $servicio = Servicio::find($id);
                        $servicio->eliminar();
                    }
                }
            }
        }
    }
}
