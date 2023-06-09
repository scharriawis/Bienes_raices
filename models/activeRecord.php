<?php

namespace Model;

class ActiveRecord{
        
    //Base de datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    //Errores
    protected static $errores = [];
    
    //Definir la base de datos
    public static function setDB($database){
        self::$db = $database;
    }

    public function guardar(){
        //si no esta lo crea y si lo esta lo actualiza
        if(!is_null($this->id)){
            $this->actualizar();
        }else{
            $this->crear();
        }
    }

    public function crear(){

        //sanitizar Datos
        $datos = $this->sanitizarDatos();
        //Insertar a la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($datos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($datos));
        $query .= " ');";
        
        $resultado = self::$db->query($query);
            //Mensaje de exito o de error
            if($resultado){
                //redireccionar al usuario
                header('Location: /admin?resultado=1');
            }
    }

    public function actualizar(){
        $atributos = $this->sanitizarDatos();
        $valores = [];
        foreach($atributos as $key => $value){
            $valores[] = "{$key} = '{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ;";

        $resultado = self::$db->query($query);
        
        if($resultado){
            //redireccionar al usuario
            header('Location: /admin?resultado=2');
        }
    }

    public function eliminar (){
        //Eliminar propiedad
        $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ;";
        $resultado = self::$db->query($query);
        if($resultado){
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    //Subida de archivos
    public function setImagen($imagen){

        //Elimina la imagen previa
        //Sí existe el id es porque estamos actualizando
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        //Asignar el atributo el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }
    
    //Eliminar archivo imagen
    public function borrarImagen(){
        //Comprobar si existe el archivo
        $existeArvhivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if($existeArvhivo){
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
        
    }

    //Identifica y se recorre en una variable las columnas de la BD.
    public function datos(){
        $datos = [];

        foreach(static::$columnasDB as $columna){
            if($columna === 'id') continue;//ignora el elemento 'id'
            $datos[$columna] = $this->$columna;
        }
        return $datos;
    }

    public function sanitizarDatos(){
        $datos = $this->datos();
        $sanitizado = [];
        foreach($datos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    //Validación
    public static function getErrores(){
        return static::$errores;
    }

    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    //Listar todas las propiedades
    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Listar ciertas propiedades
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    //Buscar la propiedad por su id
    public static function find($id){
        $consulta = "SELECT * FROM " . static::$tabla . " WHERE id = $id;";

        $resultado = self::consultarSQL($consulta);

        return array_shift($resultado);
    }

    public static function consultarSQL($query){
        //Consultar la base de datos
        $resultado = self::$db->query($query);
        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        //Liberar la memoria
        $resultado->free();
        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key=> $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $args = [] ){
        foreach($args as $key => $value){
            if(property_exists($this, $key)  && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}