<?php

namespace Controllers;
use MVC\Router;
use Model\Administrador;

class AdministradorController  {
    public static function crear(Router $router) {
        //Instancia de la administrador
        $administrador = new Administrador;

        //Consultar Administradores
        $administradores = Administrador::all();

        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Administrador::getErrores();


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Crea una nueva instancia
            $administrador = new Administrador($_POST['administrador']);

            //Validar
            $errores = $administrador->validar();
            //Condicion para insertar
            if(empty ($errores)) {
                $db = conectarDB();

            // Crear un email y password
            $nombre = $administrador->nombre;
            $apellidos = $administrador->apellidos;
            $usuario = $administrador->usuario;
            $email = $administrador->email;
            $password = $administrador->password;
            $rol = $administrador->rol;
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);


            // Query para crear el usuario
            $query = " INSERT INTO administradores (nombre, apellidos, usuario, email, password, rol) VALUES ('$nombre', '$apellidos', '$usuario', '$email', '$passwordHash', '$rol')";


            // Agregarlo a la base de datos
            

            $resultado = mysqli_query($db, $query);



            //INSERTAR EN LA BASE DE DATOS        
            if($resultado) {
                //redireccionar al usuario
                header('Location: /admin?resultado=1');
            }
            }
        } 
        $router->render('administradores/crear', [
            'administrador' => $administrador,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');

        // Obtener los datos de la propiedad
        $administrador = Administrador::find($id);
        
        //ARREGLO CON MENSAJES DE ERRORES
        $errores = Administrador::getErrores();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
            //Asingar los atributos
            $args = $_POST['administrador'];
            $administrador->sincronizar($args);
        
            //Validación
            $errores = $administrador->validar();
        
            if(empty($errores)) {

                    $administrador->guardar();
            }
        } 
        $router->render('administradores/actualizar', [
            'administrador' => $administrador,
            'errores' => $errores
        ]);
    }

    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
        
            if($id) {            
                $tipo = $_POST['tipo'];
                // peticiones validas
                if(validarTipoContenido($tipo) ) {
    
    
                    $administrador = Administrador::find($id);
                    $administrador->eliminar();
                    }
                }
            }
    }
}