<?php

namespace Model;

class Blog extends ActiveRecord{

    protected static $tabla = 'blogs';
    protected static $columnasDB = ['id', 'titulo', 'imagen', 'fecha', 'nombre', 'descripcion'];

    public $id;
    public $titulo;
    public $imagen;
    public $fecha;
    public $nombre;
    public $descripcion;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';

    }

    //Validación form blog
    public function validar(){
        if(!$this->titulo){
            self::$errores [] = 'Debes escribir un titulo';
        }

        if(!$this->imagen){
            self::$errores [] = 'Debes subir una imagen';
        }

        if(!$this->nombre){
            self::$errores [] = 'Debes escribir un nombre';
        }

        if(!$this->descripcion){
            self::$errores [] = 'Debes escribir un descripcion';
        }

        return self::$errores;
    }

}
