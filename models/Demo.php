<?php

namespace Model;

class Demo extends ActiveRecord{
    protected static $tabla = 'demos';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'cantIdiomas', 'idiomas', 'cantCanales', 'canales', 'pagosDirectos', 'geoLoc', 'creado'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $cantIdiomas;
    public $idiomas;
    public $cantCanales;
    public $canales;
    public $pagosDirectos;
    public $geoLoc;
    public $creado;
    
    public function __construct($args = [])  {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->cantIdiomas = $args['cantIdiomas'] ?? [];
        $this->idiomas = $args['idiomas'] ?? [];
        $this->cantCanales = $args['cantCanales'] ?? [];
        $this->canales = $args['canales'] ?? [];
        $this->pagosDirectos = $args['pagosDirectos'] ?? '';
        $this->geoLoc = $args['geoLoc'] ?? '';
        $this->creado = date('Y/m/d');
    }

    public function validar() {

        if(!$this->titulo) {
            self::$errores[] = "Debes agregar un titulo";
        }
        if(!$this->precio) {
            self::$errores[] = "El precio es obligatorio";
        }
        if( strlen($this->descripcion) < 10 ) {
            self::$errores[] = "La descripción es obligatoria y debe contener minimo 10 caracteres";
        }
        if(!$this->cantIdiomas) {
            self::$errores[] = "La cantidad de idiomas es obligatoria";
        }
        if(!$this->idiomas) {
            self::$errores[] = "Debes seleccionar al menos un idioma";
        }
        if(!$this->cantCanales) {
            self::$errores[] = "La cantidad de canales es obligatoria";
        }
        if(!$this->canales) {
            self::$errores[] = "Debes seleccionar al menos un canal";
        }
        if(!$this->pagosDirectos) {
            self::$errores[] = "Debes seleccionar si incluye pagos directos o no";
        }
        if(!$this->geoLoc)  {
            self::$errores[] = "Debes seleccionar si incluye geo-localizacion o no";
        }
        
        if(!$this->imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }
        
        return self::$errores;
        }
}