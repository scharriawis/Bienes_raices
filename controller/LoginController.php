<?php

namespace Controller;
use MVC\Router;
use Model\Admin;


class LoginController{
    public static function login ( Router $router) {

        $errores = [];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            //Instanciar el usuario
            $auth = new Admin($_POST);

            //válidar el formulario
            $errores = $auth->validar();

            //Revisar si el array errores esta vacío
            if(empty($errores)){
                //Revisar si el usuario envió datos en el formulario
                $resultado = $auth->comprobarFormulario();             //$resultado permanece como NULL

                //Si el usuario no envió datos
                if(!$resultado){
                    //Mensaje de error
                    $errores = Admin::getErrores();
                }else{
                    //Autenticar password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado){
                        //Autenticar usuario
                        $auth->autenticarUsuario();
                    }else{
                        //Password incorrecto (Mensaje error)
                        $errores = Admin::getErrores();
                    }
                }
            }
        }
        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout (){
        //Se inicia la sesión
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}