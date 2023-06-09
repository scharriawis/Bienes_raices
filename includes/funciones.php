<?php

define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function debuguear($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

//Escapa / sanitizar el HTML
function s ($html){
    $s = htmlspecialchars($html);
    return $s;
}

//Válidar tipo de contenido en formulario de tipo hidden
function validarTipoContenido($tipo){
    $tipos = ['propiedad', 'vendedor', 'blog'];
    return in_array($tipo, $tipos);  //Busca dentro de un array
    /*return es importante ya que la variable $tipo viene como un string ya sea
    vendedor o propiedad el cuál la funcion in_array va a buscar dentro de un arreglo
    y devuelve el valor para seguir su proceso*/
}

//Muestra notificaciones en el index
function mostrarNotificacion($codigo){
    $mensaje = '';
    switch($codigo){
        case 1:
            $mensaje = 'Creado correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }
    return $mensaje;
}

function validarORedireccionar(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: $url");
    }

    return $id;
}