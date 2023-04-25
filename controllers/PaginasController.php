<?php

namespace Controllers;
use MVC\Router;
use Model\Demo;
use Model\Blog;
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PaginasController  {
    public static function home(Router $router) {
        $demos = Demo::get(3);
        $blogs = Blog::get(3);
        $inicio = true;

        $router->render('paginas/home', [
            'demos' => $demos,
            'blogs' => $blogs,
            'inicio' =>  $inicio
        ]);
    }
    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }
    public static function demos(Router $router) {
        $demos = Demo::all();

        $router->render('paginas/demos', [
            'demos' => $demos
        ]);
    }
    public static function demo(Router $router) {
        $id  = validarORedireccionar('/demos');

        $demo = Demo::find($id);
        $router->render('paginas/demo', [
            'demo' => $demo
        ]);
    }
    public static function tarifas(Router $router) {
        $router->render('paginas/tarifas', []);
    }

    public static function terminosYcondiciones(Router $router) {
        $router->render('paginas/terminosYCondiciones', []);
    }

    public static function politicasDePrivacidad(Router $router) {
        $router->render('paginas/politicasDePrivacidad', []);
    }

    public static function blogs(Router $router) {
        $blogs = Blog::all();

        $router->render('paginas/blogs', [
            'blogs' => $blogs
        ]);
    }
    public static function blog(Router $router) {
        $id  = validarORedireccionar('/blogs');

        $blog = Blog::find($id);
        $router->render('paginas/blog', [
            'blog' => $blog
        ]);
    }
    public static function contacto(Router $router) {
        $mensaje = null;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $respuestas = $_POST['contacto'];


            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.ionos.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'info@inbotscr.com';                     //SMTP username
                $mail->Password   = 'Jygf08162';                               //SMTP password
                $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
                $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('info@inbotscr.com', 'Inbotscr');
                $mail->addAddress('info@inbotscr.com');     //Add a recipient
                $mail->Subject = 'Nuevo mensaje desde la página';

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->CharSet = 'UTF-8';

                $contenido = '<html>';
                $contenido .= '<p>Tienes un nuevo mensaje</p>';
                $contenido .= '<p>Nombre: ' . $respuestas['nombre'] .  '</p>';

                if($respuestas['contactar'] === 'Telefono') {
                    $contenido .= '<p>Eligió ser contactado por: ' . $respuestas['contactar'] . '</p>';
                    $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] .  '</p>';
                    $contenido .= '<p>Fecha de contacto: ' . $respuestas['fecha'] .  '</p>';
                    $contenido .= '<p>Hora de contacto: ' . $respuestas['hora'] .  '</p>';
                } else {
                    // Es email
                    $contenido .= '<p>Eligió ser contactado por: ' . $respuestas['contactar'] . '</p>';
                    $contenido .= '<p>Email: ' . $respuestas['email'] .  '</p>';
                }

                $contenido .= '<hr></hr>';
                if($respuestas['opciones'] === 'Cotizacion') {
                $contenido .= '<p>Eligió la opción de: ' . $respuestas['opciones'] .  '</p>';
                $contenido .= '<p>Cotización: ' . '</p>';
                $contenido .= '<hr></hr>';
                $contenido .= '<p> ' . $respuestas['Cotizacion'] .  '</p>';
                $contenido .= '<hr></hr>';
                } else if($respuestas['opciones'] === 'FAQ') {
                    $contenido .= '<p>Eligió la opción de: ' . $respuestas['opciones'] .  '</p>';
                    $contenido .= '<p>Consulta: ' . '</p>';
                    $contenido .= '<p> ' . $respuestas['FAQ'] .  '</p>';
                    $contenido .= '<hr></hr>';
                } else{
                    $contenido .= '<p>Eligió la opción de: ' . $respuestas['opciones'] .  '</p>';
                    $contenido .= '<p>Mensaje: ' . '</p>';
                    $contenido .= '<hr></hr>';
                    $contenido .= '<p> ' . $respuestas['Otro'] .  '</p>';
                    $contenido .= '<hr></hr>';
                }

                $contenido .= '</html>';
                
                $mail->Body    = $contenido;
                $mail->AltBody = 'Este es un texto alternativo para los clientes non-HTML';

                $mail->send();
                $mensaje = 'Mensaje enviado correctamente';
            } catch (Exception $e) {
                $mensaje = "El mensaje no se pudo enviar. Mailer Error: {$mail->ErrorInfo}";
            }
        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }
}