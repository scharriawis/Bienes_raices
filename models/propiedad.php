<?php

namespace Model;

class Propiedad extends ActiveRecord{

    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'descripcion', 'imagen', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedoresId'];

    public $id;
    public $titulo;
    public $precio;
    public $descripcion;
    public $imagen;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedoresId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedoresId = $args['vendedoresId'] ?? '';
    }

    //Validación form propiedades
    public function validar(){
        if(!$this->titulo){
            self::$errores [] = 'Debes incluir un titulo';
        }

        if(!$this->precio){
            self::$errores [] = 'Debes incluir un precio';
        }

        if(!$this->imagen){
            self::$errores [] = 'Debes subir una imagen';
        }

        if( strlen($this->descripcion) < 50){
            self::$errores [] = 'la descripción es obligatoria y  debe tener al menos 50 caracteres';
        }

        if(!$this->habitaciones){
            self::$errores [] = 'El numero de habitaciones es obligatorio';
        }

        if(!$this->wc){
            self::$errores [] = 'El numero de baños es obligatorio';
        }

        if(!$this->estacionamiento){
            self::$errores [] = 'El numero de estacionamiento es obligatorio';
        }

        if(!$this->vendedoresId){
            self::$errores [] = 'Elije un vendedor';
        }

        return self::$errores;
    }

}