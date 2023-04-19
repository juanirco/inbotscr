<?php

require_once __DIR__ . "/../includes/app.php";

use Controllers\LoginController;
use MVC\Router;
use Controllers\DemoController;
use Controllers\BlogController;
use Controllers\AdministradorController;
use Controllers\PaginasController;


$router = new Router();

$router->get('/admin', [DemoController::class, 'index']);
$router->get('/demos/crear', [DemoController::class, 'crear']);
$router->post('/demos/crear', [DemoController::class, 'crear']);
$router->get('/demos/actualizar', [DemoController::class, 'actualizar']);
$router->post('/demos/actualizar', [DemoController::class, 'actualizar']);
$router->post('/demos/eliminar', [DemoController::class, 'eliminar']);


$router->get('/administradores/crear', [AdministradorController::class, 'crear']);
$router->post('/administradores/crear', [AdministradorController::class, 'crear']);
$router->get('/administradores/actualizar', [AdministradorController::class, 'actualizar']);
$router->post('/administradores/actualizar', [AdministradorController::class, 'actualizar']);
$router->post('/administradores/eliminar', [AdministradorController::class, 'eliminar']);

$router->get('/blogs/crear', [BlogController::class, 'crear']);
$router->post('/blogs/crear', [BlogController::class, 'crear']);
$router->get('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/actualizar', [BlogController::class, 'actualizar']);
$router->post('/blogs/eliminar', [BlogController::class, 'eliminar']);

$router->get('/', [PaginasController::class, 'home']);
$router->get('/inicio', [PaginasController::class, 'home']);
$router->get('/home', [PaginasController::class, 'home']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/demos', [PaginasController::class, 'demos']);
$router->get('/demo', [PaginasController::class, 'demo']);
$router->get('/tarifas', [PaginasController::class, 'tarifas']);
$router->get('/politicasDePrivacidad', [PaginasController::class, 'politicasDePrivacidad']);
$router->get('/terminosYcondiciones', [PaginasController::class, 'terminosYcondiciones']);
$router->get('/blogs', [PaginasController::class, 'blogs']);
$router->get('/blog', [PaginasController::class, 'blog']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login  y Autenticacion

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
