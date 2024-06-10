<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ServicioController;
use Controllers\FisioterapeutaController;
use Controllers\LoginController;
use Controllers\PaginasController;

$router = new Router();

// URL's privadas
$router->get('/admin', [ServicioController::class, 'index']);
$router->get('/servicios/crear', [ServicioController::class, 'crear']);
$router->post('/servicios/crear', [ServicioController::class, 'crear']);
$router->get('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/actualizar', [ServicioController::class, 'actualizar']);
$router->post('/servicios/eliminar', [ServicioController::class, 'eliminar']);

$router->get('/fisioterapeutas/crear', [FisioterapeutaController::class, 'crear']);
$router->post('/fisioterapeutas/crear', [FisioterapeutaController::class, 'crear']);
$router->get('/fisioterapeutas/actualizar', [FisioterapeutaController::class, 'actualizar']);
$router->post('/fisioterapeutas/actualizar', [FisioterapeutaController::class, 'actualizar']);
$router->post('/fisioterapeutas/eliminar', [FisioterapeutaController::class, 'eliminar']);

// URL's públicas
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/servicios', [PaginasController::class, 'servicios']);
$router->get('/servicio', [PaginasController::class, 'servicio']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login y Autentificación
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
