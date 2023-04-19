<?php

namespace Controllers;
use MVC\Router;
use Model\Demo;
use Model\Blog;
use Model\Administrador;
use Intervention\Image\ImageManagerStatic  as Image;

class DemoController {
    public static function index(Router $router) {
        $demos = Demo::all();
        $blogs = Blog::all();
        $administradores = Administrador::all();
        //Muestra msj condicional
        $resultado = $_GET['resultado'] ?? null;

        
        $router->render('demos/admin', [
            'demos' => $demos,
            'blogs' => $blogs,
            'administradores' => $administradores,
            'resultado' => $resultado
        ]);
    }
    
    public static function crear(Router $router) {
        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Demo::getErrores();
        $demo = new Demo;
        $administradores = Administrador::all();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crea una nueva instancia
            $demo = new Demo($_POST['demo']);


        // Obtenemos los valores de los checkboxes seleccionados
            $idiomas = isset($_POST['demo']['idiomas']) ? implode(',', $_POST['demo']['idiomas']) : '';
            $canales = isset($_POST['demo']['canales']) ? implode(',', $_POST['demo']['canales']) : '';
            
            // Asignamos los valores de los checkboxes a las propiedades correspondientes del objeto $demo
            $demo->idiomas = $idiomas;
            $demo->canales = $canales;
            //Generar un nombre unico
                                                    /* Lo de abajo es para agregar la extensión */ 
            $nombreImagen =  md5(uniqid( rand(), true)) . strrchr($_FILES['demo']['name']['imagen'], '.');
        
            // Setear la imagen
           // Realiza un resize a la imagen con Intervention
           if($_FILES['demo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['demo']['tmp_name']['imagen'])->fit(1080);
                $demo->setImagen($nombreImagen);
           }
        
            //Validar
            $errores = $demo->validar();
            //Condicion para insertar
            if(empty ($errores)) {
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
        
                //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    // Guarda en la base de datos
                    $demo->guardar();
            }
        } 

        $router->render('demos/crear', [
            'demo' => $demo,
            'administradores' => $administradores,
            'errores' => $errores

        ]);
    }

    public static function actualizar(Router $router) {
        
        $id = validarORedireccionar('/admin');
        // Obtener los datos de la demo
        $demo = Demo::find($id);

        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Demo::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asingar los atributos
            $args = $_POST['demo'];
            $demo->sincronizar($args);

            //Validación
            $errores = $demo->validar();
            // Obtenemos los valores de los checkboxes seleccionados
            $idiomas = isset($_POST['demo']['idiomas']) ? implode(',', $_POST['demo']['idiomas']) : '';
            $canales = isset($_POST['demo']['canales']) ? implode(',', $_POST['demo']['canales']) : '';

            // Asignamos los valores de los checkboxes a las propiedades correspondientes del objeto $demo
            $demo->idiomas = $idiomas;
            $demo->canales = $canales;
        
            //Generar un nombre unico
                                                    /* Lo de abajo es para agregar la extensión */ 
            $nombreImagen =  md5(uniqid( rand(), true)) . strrchr($_FILES['demo']['name']['imagen'], '.');
        
            // Realiza un resize a la imagen con Intervention
            if($_FILES['demo']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['demo']['tmp_name']['imagen'])->fit(1080);
                $demo->setImagen($nombreImagen);
            }
            if(empty($errores)) {
                    // Almacenar la imagen
                    if($_FILES['demo']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    $demo->guardar();
                }
        } 

        $router->render('demos/actualizar', [
            'demo' => $demo,
            'errores' => $errores
        ]);
        
    }


    public static function eliminar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $tipo = $_POST['tipo'];
        
            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
                $demo = Demo::find($id);
                $demo->eliminar();
                }
            }
    }
}