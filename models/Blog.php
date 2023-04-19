<?php

namespace Model;

class Blog extends ActiveRecord{
    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'imagen', 'texto', 'administradoresId', 'fecha'];


    public $id;
    public $titulo;
    public $imagen;
    public $texto;
    public $administradoresId;
    public $fecha;
    
    public function __construct($args = [])  {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->texto = $args['texto'] ?? '';
        $this->administradoresId = $args['administradoresId'] ?? '';
        $this->fecha = date('Y/m/d');
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errores[] = "Debes agregar un titulo";
        }
        if( strlen($this->texto) < 10 ) {
            self::$errores[] = "La descripción es obligatoria y debe contener minimo 10 caracteres";
        }
        if(!$this->administradoresId) {
            self::$errores[] = "Debes seleccionar al menos un administradoresId";
        }
        
        if(!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }
        
        return self::$errores;
        }
}