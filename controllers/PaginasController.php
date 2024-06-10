<?php

namespace Controllers;

use MVC\Router;
use Model\Servicio;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{
    public static function index(Router $router)
    {
        $servicios = Servicio::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'servicios' => $servicios,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router)
    {
        $router->render('paginas/nosotros', []);
    }

    public static function servicios(Router $router)
    {
        $servicios = Servicio::all();

        $router->render('paginas/servicios', [
            'servicios' => $servicios
        ]);
    }

    public static function servicio(Router $router)
    {
        $id = validarORedireccionar('/servicios');

        // Buscar el servicio por su ID
        $servicio = Servicio::find($id);

        $router->render('paginas/servicio', [
            'servicio' => $servicio
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('paginas/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('paginas/entrada', []);
    }

    public static function contacto(Router $router)
    {
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];

            // // Crear una instancia de PHPMailer
            $phpmailer = new PHPMailer();

            // // Configurar SMTP (Protocolo para envio de emails)
            $phpmailer = new PHPMailer();
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '272bdb8bd67b86';
            $phpmailer->Password = '395d933c754073';

            // Configurar el contenido del email
            $phpmailer->setFrom('admin@fisioterapia.com');
            $phpmailer->addAddress('admin@fisioterapia.com', 'Fisioterapia.com');
            $phpmailer->Subject = 'Tienes un Nuevo Mensaje';

            // Habilitar HTML
            $phpmailer->isHTML(true);
            $phpmailer->CharSet = 'UTF-8';

            // Definir el contenido del email
            $contenido = '<html>';
            $contenido .= '<p>Tienes un Nuevo Mensaje</p>';
            $contenido .= '<p>Nombre:  ' . $respuestas['nombre'] . ' </p>';
            $contenido .= '<p>Primer Apellido:  ' . $respuestas['apellido1'] . ' </p>';
            $contenido .= '<p>Segundo Apellido:  ' . $respuestas['apellido2'] . ' </p>';
            $contenido .= '<p>Email:  ' . $respuestas['email'] . ' </p>';
            $contenido .= '<p>Teléfono:  ' . $respuestas['telefono'] . ' </p>';
            $contenido .= '<p>Mensaje:  ' . $respuestas['mensaje'] . ' </p>';
            $contenido .= '<p>Preferencia de Contacto:  ' . $respuestas['contacto'] . ' </p>';
            $contenido .= '<p>Fecha de Contacto:  ' . $respuestas['fecha'] . ' </p>';
            $contenido .= '<p>Hora de Contacto:  ' . $respuestas['hora'] . ' </p>';
            $contenido .= '</html>';


            $phpmailer->Body = $contenido;
            $phpmailer->AltBody = 'Esto es texto alternativo sin HTML';

            // Enviar el email
            if ($phpmailer->send()) {
                $mensaje = "mensaje enviado correctamente";
            } else {
                $mensaje = "no se pudo enviar el mensaje";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
