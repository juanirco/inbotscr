<?php

if(!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="En Inbotscr, ofrecemos soluciones de chatbots y chatmarketing para empresas en Costa Rica y en todo el mundo. Nuestros expertos en inteligencia artificial y marketing digital diseñan y desarrollan chatbots personalizados para mejorar la experiencia del usuario y aumentar la eficiencia empresarial. ¡Contáctanos hoy para llevar tu negocio al siguiente nivel con nuestras soluciones de chatbot y chatmarketing! #Inbotscr #Chatbots #CostaRica">
    <title>Inbotscr | Expertos en Chatbots y Chatmarketing</title>
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <header class="header">
            <div class="barra">
                <div class="izquierda">
                    <a href="/">
                        <img src="../build/img/whiteLogo.png" alt="Logotipo de Inbotscr">
                    </a>
                </div>
                <div class="centro">
                    <div class="mobile-menu">
                        <img src="../build/img/barras.svg" alt="Icono menu responsive">
                    </div>
                    <nav class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/demos">Plantillas</a>
                        <a href="/tarifas">Tarifas</a>
                        <a href="/contacto">Contacto</a>
                        <a href="/blogs">Blog</a>
                        <?php if($auth): ?>
                        <a href="/admin">Admin</a> <!-- Mostrar link de admin -->
                    <?php endif?>
                    </nav>
                </div>
                <div class="derecha">
                <img class="dark-mode-boton uno" src="../build/img/dark-mode.svg" alt="boton dark mode">
                    <?php if(!$auth): ?>
                        <a href="/login"><img class="sesionBtn dos" src="../build/img/unlocked.svg"></a> <!-- Abrir sesion -->
                    <?php endif?>
                    <?php if($auth): ?>
                        <a href="/logout"><img class="sesionBtn dos" src="../build/img/lock.svg"></a>  <!-- Cerrar sesion -->
                    <?php endif?>
                </div>
            </div>  <!-- div barra-->
    </header>

    <?php echo $contenido; ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class="navegacion">
                <a href="/nosotros">Nosotros</a>
                <a href="/demos">Plantillas</a>
                <a href="/tarifas">Tarifas</a>
                <a href="/contacto">Contacto</a>
                <a href="/blogs">Blog</a>
            </nav>
        </div>
        <div class="finalFooter">
            <div class="politicas">
                <a href="/terminosYcondiciones">Términos & Condiciones</a><span>|</span>
                <a href="/politicasDePrivacidad">Políticas de Privacidad</a>
            </div>
            <p class="copyright">Todos los derechos reservados de Inbotscr <?php echo date('Y')?> &copy;</p>
            <div class="redes">
                <p>Siguenos en nuestras redes</p>
                <ul>
                    <li>
                        <a href="https://wa.me/+50683189598" class="whatsapp" target="_blank">                        
                            <img src="../build/img/whatsapp.svg" alt="Link a cuenta de Whatsapp de Inbotscr">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/inbotscr/" class="linkedin" target="_blank">
                            <img src="../build/img/linkedin.svg" alt="Link a cuenta de Linkedin de Inbotscr">
                        </a> 
                    </li>
                    <li>
                        <a href="https://www.instagram.com/inbotscr/" class="instagram" target="_blank">
                            <img src="../build/img/instagram.svg" alt="Link a cuenta de Instagram de Inbotscr">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/inbotscr" class="facebook" target="_blank">
                            <img src="../build/img/facebook.svg" alt="Link a cuenta de Facebook de Inbotscr">
                        </a>   
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" class="twitter" target="_blank">
                            <img src="../build/img/twitter.svg" alt="Link a cuenta de Twitter de Inbotscr">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/@inbotscr3426" class="youtube" target="_blank">
                            <img src="../build/img/youtube.svg" alt="Link a canal de Inbotscr en Youtube">
                        </a>
                    </li>
                </ul>
            </div>

        </div>

    </footer>

        <script src="../build/js/bundle.min.js"></script>
    </body>
</html>  