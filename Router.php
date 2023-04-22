<?php

namespace MVC;

class Router {

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)  {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn)  {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();

        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // debug($metodo);
        $auth = $_SESSION['login'] ?? null;

        // Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/demos/crear', '/demos/actualizar', '/demos/eliminar', '/administradores/crear', '/administradores/actualizar', '/administradores/eliminar', '/blogs/crear', '/blogs/actualizar', '/blogs/eliminar'];

        if(in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /home');
        }

        if($fn) {
            // La URL existe y hay una funcion asociada
            call_user_func($fn, $this);
        } else {
            echo  "Página no encontrada";
        }
    }

    // Muestra una vista
    public function render($view, $datos = [])  {
        foreach($datos as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}