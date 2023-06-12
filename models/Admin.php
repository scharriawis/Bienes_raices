<?php

namespace Model;

class Admin extends ActiveRecord {

    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar(){
        if(!$this->email){
            self::$errores [] = 'El correo es obligatorio';
        }

        if(!$this->password){
            self::$errores [] = 'La contraseña es obligatoria';
        }

        return self::$errores;
    }

    //Comprobar si el usuario existe
    public function comprobarFormulario(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1;";
        $resultado = self::$db->query($query);

        //Si el usuario no existe
        if(!$resultado->num_rows){          //num_rows int = 0 no existe
            self::$errores[] = 'El usuario no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado){
        //fetch_object trae los datos de la database
        $usuario = $resultado->fetch_object();

        //Vereficar el password 1 valor con el que el usuario escribio con 2 esta en database
        $autenticado = password_verify($this->password, $usuario->password);

        //Sí el password no es correcto
        if(!$autenticado){
            self::$errores[] = 'El password es incorrecto';
        }
        
        return $autenticado;
        
    }

    public function autenticarUsuario(){
        session_start();
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
