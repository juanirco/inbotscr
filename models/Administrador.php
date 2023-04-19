<?php

namespace Model;

class Administrador extends ActiveRecord{
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

        if(!$this->nombre) {
            self::$errores[] = "Debes agregar un nombre";
        }
        if(!$this->apellidos) {
            self::$errores[] = "Debes agregar un apellido";
        }
        if(!$this->usuario) {
            self::$errores[] = "El número telefónico es obligatorio";
        }
        
        return self::$errores;
        }
}