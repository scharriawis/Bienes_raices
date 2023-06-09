<?php

namespace Model;

class Vendedores extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono', 'imagen'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
    }

    //Validación form propiedades
    public function validar(){
        if(!$this->nombre){
            self::$errores [] = 'Debes escribir el nombre';
        }

        if(!$this->apellido){
            self::$errores [] = 'Debes escribir el apellido';
        }

        if(!$this->telefono){
            self::$errores [] = 'El numero de telefonico es obligatorio';
        }

        if(!$this->imagen){
            self::$errores [] = 'Debes subir una imagen';
        }



        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[] = 'Formato del telefono no es válido';
        }

        return self::$errores;
    }    
}