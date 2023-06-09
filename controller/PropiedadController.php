<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Model\Blog;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{

    //Propiedades admin
    public static function index(Router $router){
        
        $propiedades = Propiedad::all();//Consulta todas las propiedades
        $vendedores = Vendedores::all();//Consulta todos los vendedores
        $blogs = Blog::all();//Consulta todos los blogs
        $resultado = $_GET['resultado'] ?? null;//variable disponible en el admin.php y mustra la condicional en el admin.php
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'blogs' => $blogs,
            'resultado' => $resultado
        ]);
    }

    //Propiedades crear
    public static function crear(Router $router){

        $propiedad = new Propiedad();//Crea una nueva instancia propiedad
        $vendedores = Vendedores::all();//Consulta todos los vendedores
        $errores = Propiedad::getErrores();//Obtiene el mensaje de error

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //instanciar la clase propiedadd y creando un método guardar
            $propiedad = new Propiedad($_POST['propiedad']);
            
            //Subida de archivos
            //generar un nombre único
            $nombreImagen = md5( uniqid( rand(), true)) . "archivo.jpg";
            
            //setear la imagen
            //Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']);
                $image->fit(800,600);
                $propiedad->setImagen($nombreImagen);//envía el nombre de la imagen
            }

            
            //validar el formulario
            $errores = $propiedad->validar();
            
            //Revisar si el array de errores esta vacío
            if(empty($errores)){
                
                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                //Método guardar en la database
                $propiedad->guardar();
            }
        
        }

        //LLama la funcion render para asociarlas con el formulario y demás campos para la interacción con la b.d.
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    //Propiedades actualizar
    public static function actualizar(Router $router){
        
        $id = validarORedireccionar('/admin');//Se crea la variable para la validación o lo redirecciona
        $propiedad = Propiedad::find($id);//Busca en la database el id propiedad
        $vendedores = Vendedores::all();//Consulta en database todos los vendedores
        $errores = Propiedad::getErrores();//Arreglo con mensaje de errores

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Asignar los atributos a la class Propiedad
            $args = $_POST['propiedad'];
            
            $propiedad->sincronizar($args);

            //validación de errores
            $errores = $propiedad->validar();

            //Subida de archivos

            //Crea un nombre único a la imagen
            $nombreImagen = md5( uniqid( rand(), true)) . "archivo.jpg";
            
            //Setear la imagen
            //Realiza un resize a la imagen con intervention
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen']);
                $image->fit(800,600);
                $propiedad->setImagen($nombreImagen);
            }

            //Revisar si el array de errores esta vacío
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    //Almacenar la imagen en el disco duro
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }            
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);

    }

    //Propiedades eliminar
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
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }
            }
                
        }
    }
  
}