<?php

namespace Controller;
use MVC\Router;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController{

    //Vendedor Crear
    public static function crear(Router $router){
        
        $vendedor = new Vendedores();//Crea una nueva instancia Vendedores en la database
        $errores = Vendedores::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            //Instanciar el array vendedor y creando un método guardar
            $vendedor = new Vendedores($_POST['vendedor']);

            //Subida de archivos
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true)) . "archivo.jpg";

            if($_FILES['vendedor']['tmp_name']['imagen']){
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen']);
                $image->fit(800,600);
                $vendedor->setImagen($nombreImagen);//envía el nombre de la imagen
            }
            
            //validar el formulario
            $errores = $vendedor->validar();
            
            //Revisar si el array de errores esta vacío
            if(empty($errores)){
                
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                //Método guardar en la database
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    //Vendedor actualizar
    public static function actualizar(Router $router){

        $id = \validarORedireccionar('/admin');
        $vendedor = Vendedores::find($id);
        $errores = Vendedores::getErrores();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Asignar los atributos a la class Vendedores
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);

            //Validación de errores
            $errores = $vendedor->validar();

            //Subida de archivos
            //Generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true)) . "archivo.jpg";

            if($_FILES['vendedor']['tmp_name']['imagen']){
                $image = Image::make($_FILES['vendedor']['tmp_name']['imagen']);
                $image->fit(800,600);
                $vendedor->setImagen($nombreImagen);//envía el nombre de la imagen
            }
                        
            //Revisar si el array de errores esta vacío
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }            
                $vendedor->guardar();
            }

            
        }

        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function eliminar(){
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
                    //Busca la propiedad por su id
                    $vendedor = Vendedores::find($id);
                    $vendedor->eliminar();
                }
            }
        }
    }
}