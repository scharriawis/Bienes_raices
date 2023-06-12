<?php

namespace Controller;

use MVC\Router;
use Model\Blog;
use Intervention\Image\ImageManagerStatic as Image;

class BlogController{

    public static function crear( Router $router ){
        
        $blog = new Blog();//Crea una nueva instancia blog
        $errores = Blog::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            //Instanciar el array blog y creando un método guardar
            $blog = new Blog($_POST['blog']);

            //Subida de archivos
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true)) . "archivo.jpg";

            if($_FILES['blog']['tmp_name']['imagen']){
                $image = Image::make($_FILES['blog']['tmp_name']['imagen']);
                $image->fit(800,600);
                $blog->setImagen($nombreImagen);//envía el nombre de la imagen
            }
            
            //validar el formulario
            $errores = $blog->validar();
            
            //Revisar si el array de errores esta vacío
            if(empty($errores)){
                
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                //Método guardar en la database
                $blog->guardar();
            }
        }        

        $router->render('/blogs/crear', [
            'blog' => $blog,
            'errores' => $errores
        ]);
    }

    public static function actualizar( Router $router ){
        
        $id = \validarORedireccionar('/admin');
        $blog = Blog::find($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Asignar los atributos a la class Propiedad
            $args = $_POST['blog'];
            
            $blog->sincronizar($args);

            //validación de errores
            $errores = $blog->validar();

            //Subida de archivos

            //Crea un nombre único a la imagen
            $nombreImagen = md5( uniqid( rand(), true)) . "archivo.jpg";
            
            //Setear la imagen
            //Realiza un resize a la imagen con intervention
            if($_FILES['blog']['tmp_name']['imagen']){
                $image = Image::make($_FILES['blog']['tmp_name']['imagen']);
                $image->fit(800,600);
                $blog->setImagen($nombreImagen);
            }

            //Revisar si el array de errores esta vacío
            if(empty($errores)){
                if($_FILES['blog']['tmp_name']['imagen']){
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }            
                $blog->guardar();
            }
        }        

        $router->render('blogs/actualizar', [
            'blog' => $blog
        ]);
    }

    public static function eliminar( Router $router ){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Toma el valor de la llave id del form eliminar
            $id = $_POST['id'];
            //Sirve para válidar la variable en int
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){

                //Toma valor en la llave tipo del form
                $tipo = $_POST['tipo'];
                //Validamos el string tipo
                if(\validarTipoContenido($tipo)){
                    //Busca el blog por su id
                    $blog = Blog::find($id);
                    $blog->eliminar();
                }
            }
                
        }

    }    

}
