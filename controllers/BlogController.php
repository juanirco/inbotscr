<?php

namespace Controllers;
use MVC\Router;
use Model\Blog;
use Model\Administrador;
use Intervention\Image\ImageManagerStatic  as Image;

class BlogController {    
    
    public static function crear(Router $router) {
        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Blog::getErrores();
        $blog = new Blog;
        $administradores = Administrador::all();
        

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crea una nueva instancia
            $blog = new Blog($_POST['blog']);

            //Generar un nombre unico
                                                    /* Lo de abajo es para agregar la extensión */ 
            $nombreImagen =  md5(uniqid( rand(), true)) . strrchr($_FILES['blog']['name']['imagen'], '.');
        
            // Setear la imagen
           // Realiza un resize a la imagen con Intervention
           if($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(1080);
                $blog->setImagen($nombreImagen);
           }
        
            //Validar
            $errores = $blog->validar();
            //Condicion para insertar
            if(empty ($errores)) {
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
        
                //Guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                    // Guarda en la base de datos
                    $blog->guardar();
            }
        } 

        $router->render('blogs/crear', [
            'blog' => $blog,
            'administradores' => $administradores,
            'errores' => $errores

        ]);
    }

    public static function actualizar(Router $router) {

        $administradores = Administrador::all();
        
        $id = validarORedireccionar('/admin');
        // Obtener los datos de la blog
        $blog = Blog::find($id);

        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Blog::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Asingar los atributos
            $args = $_POST['blog'];
            $blog->sincronizar($args);

            //Validación
            $errores = $blog->validar();
        
            //Generar un nombre unico
                                                    /* Lo de abajo es para agregar la extensión */ 
            $nombreImagen =  md5(uniqid( rand(), true)) . strrchr($_FILES['blog']['name']['imagen'], '.');
        
            // Realiza un resize a la imagen con Intervention
            if($_FILES['blog']['tmp_name']['imagen']) {
                $image = Image::make($_FILES['blog']['tmp_name']['imagen'])->fit(1080);
                $blog->setImagen($nombreImagen);
            }
            if(empty($errores)) {
                    // Almacenar la imagen
                    if($_FILES['blog']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    $blog->guardar();
                }
        } 

        $router->render('blogs/actualizar', [
            'blog' => $blog,
            'administradores' => $administradores,
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
                $blog = Blog::find($id);
                $blog->eliminar();
                }
            }
    }
}