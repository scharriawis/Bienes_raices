<?php

//Este archivo sirve para en rutar al controlador que funcion y que url escojer.
namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    function comprobarRutas(){
        //Se crea el inicio de sesión
        session_start();

        //Se toma la variable login
        $auth = $_SESSION['login'] ?? null;
        
        //Se crea el array con las urls protegidas
        $rutasProtegidas = ['/admin', '/propiedades/crear', '/propiedades/actualizar', '/propiedades/eliminar',
             '/vendedores/crear', '/vendedores/actualizar', '/vendedores/eliminar'];

        //toma el valor actual de la url del servidor
        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';;
        //\debuguear($_SERVER);

        //alamacena el método get o post. del servidor
        $method = $_SERVER['REQUEST_METHOD'];

        //Identifica el metodo
        if($method === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if(in_array($urlActual, $rutasProtegidas) && !$auth){
            header('Location: /');
        }

        if($fn){
            //La url existe y hay una function asociada
            call_user_func($fn, $this);
        }else{
            echo 'Página no encontrada';
        }
    }

    //Muestra una vista
    public function render($view, $datos = []){

        foreach($datos as $key => $value){//toma el arreglo con su llave valor
            $$key = $value;//$$ significa variable de variable una variable con el mismo nombre toma ese valor de variable
        }

        ob_start();//Almcena por un momento en memoria
        include_once __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();//Limpia el buffer
        include_once __DIR__ . "/views/layout.php";
    }
}