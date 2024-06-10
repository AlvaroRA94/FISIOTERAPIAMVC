<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);

            $errores = $auth->validar();

            if (empty($errores)) {
                // Verificar si el usuario existe o no (Mensaje de Error)
                $resultado = $auth->existeUsuario();

                if (!$resultado) {
                    $errores = Admin::getErrores();
                } else {
                    // Verificar el Password
                    $autentificado = $auth->comprobarPassword($resultado);
                    if ($autentificado) {
                        // Autentificar al Usuario
                        $auth->autentificar();
                    } else {
                        // Password Incorrecto (Mensaje de Error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }
    public static function logout()
    {
        session_start();

        $_SESSION = [];

        header('Location: /');
    }
}
