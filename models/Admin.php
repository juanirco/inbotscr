<?php

namespace Model;


class Admin extends ActiveRecord{
    // Base de datos

    protected static $tabla = 'administradores';
    protected static $columnasDB = ['id', 'nombre', 'apellidos', 'usuario', 'email', 'password', 'rol'];
    
    public $id;
    public $nombre;
    public $apellidos;
    public $usuario;
    public $email;
    public $password;
    public $rol;

    public  function __construct($args =  []){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->usuario = $args['usuario'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->rol = $args['rol'] ?? '';
    }

    public function validar() {
        if(!$this->email) {
            self::$errores[]  = 'El email es obligatorio';
        }
        if(!$this->password) {
            self::$errores[]  = 'El password es obligatorio';
        }
    }

    public function existeUsuario() {
        $query = "SELECT * FROM " . self::$tabla . "  WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        if(!$resultado->num_rows) {
            self::$errores[]  = 'El Usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado) {
        $usr = $resultado->fetch_object();
        $autenticado = password_verify($this->password, $usr->password);
        
        if(!$autenticado) {
            self::$errores[] = 'El password es incorrecto';
        }

        return $autenticado;
    }

    public function autenticar() {
        session_start();
        
        //Llenar el arreglo de session
        
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header( 'Location: /admin');

    }

}