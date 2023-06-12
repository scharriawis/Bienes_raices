<?php

namespace Controller;
use Model\Blog;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    //Página de inicio
    public static function index( Router $router){

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('/paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    //Página nosotros
    public static function nosotros(Router $router){

        $router->render('/paginas/nosotros');

    }

    //Página propiedades
    public static function propiedades( Router $router){

        $propiedades = Propiedad::get(9);
        
        $router->render('/paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    //Página propiedad
    public static function propiedad( Router $router){
        
        $id = \validarORedireccionar('/');
        $propiedad = Propiedad::find($id);

        $router->render('/paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    //Página blog
    public static function blog( Router $router){
        
        $blogs = Blog::all();

        $router->render('/paginas/blog', [
            'blogs' => $blogs
        ]);
    }

    //Página entrada
    public static function entrada( Router $router){
         
        $id = \validarORedireccionar('/');
        $blog = Blog::find($id);

        $router->render('/paginas/entrada', [
            'blog' => $blog
        ]);
    }

    //Página contacto
    public static function contacto( Router $router){

        $mensaje = null;

        $respuestas =  $_POST['contacto'];
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //Crear una nueva instancia
            $mail = new PHPMailer();

            //Configurar el servidor smtp
            $mail->isSMTP();                                        //Enviar usando SMTP
            $mail-> Host = 'sandbox.smtp.mailtrap.io';                //Configure el servidor SMTP para enviar a través de
            $mail->SMTPAuth = true;                                 //Habilitar autenticación SMTP 
            $mail->Username = '92e6672e04db42';
            $mail->Password = '05b691d1ee51ef';
            $mail->MAIL_ENCRYPTION = 'tls';
            $mail->Port = 2525;

            //Destinatarios = attachments https://packagist.org/packages/phpmailer/phpmailer
            $mail->setFrom('admin@bienesraices.com');
            $mail->addAddress('admin@bienesraices.com', 'bienesraices.com');
            $mail->Subject = 'Tienes un nuevo mensajes';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //contenido
            $contenido = '<html>';
            $contenido .= '<p> Este es un nuevo mensaje </p>';
            $contenido .= '</html>'; 
            $contenido .= '<p> Nombre: ' . $respuestas['nombre'] . '</p>';
            $contenido .= '<p> Mensaje: ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p> Tipo: ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p> Presupuesto: $' . $respuestas['presupuesto'] . '</p>';
            $contenido .= '<p> Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';
            
            //Enviar de forma condicional los campos selecionados
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p> Eligió ser contactado por: </p>';
                $contenido .= '<p> Telefono: ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p> Fecha: ' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p> Hora: ' . $respuestas['hora'] . '</p>';
            }else{
                $contenido .= '<p> Eligió ser contactado por: </p>';                
                $contenido .= '<p> Email: ' . $respuestas['email'] . '</p>';
            }

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';
            
            //Envío de mensaje y de vuelve true o false
            if($mail->send()){
                $mensaje = 'El mensaje se ha enviado correctamente';
            } else{
                $mensaje = 'El mensaje no se pudo enviar';
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}
