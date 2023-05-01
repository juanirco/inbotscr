
<main class="home">
    <div class="contenido-home">
        <h1>Chatbots y estrategias de chat marketing personalizadas para tu negocio.</h1>
    </div>  <!-- div contenido-header-->
</main>

<section class="contenedor homeTitles">
    <h2>Cuando trabajas con nosotros te aseguras:</h2>
    <ul class="checks">
        <li>Mayores porcentajes de satisfacción al cliente.</li>
        <li>Mejores tasas de click y de apertura.</li>
        <li>Tener mucho mayor alcance.</li>
        <li>Aumentar tus ventas.</li>
        <li>Presencia 24/7.</li>
    </ul>

    <div class="alinear-botonPrincipal">
        <a href="/contacto" class="botonPrincipal">Contacta a Nuestro Equipo</a>
    </div>
</section>

<section class="contenedor homeTitles">
    <h2>¿Por qué elegirnos a nosotros?</h2>
    <?php include 'iconos.php' ?>
</section>

<section class="seccion contenedor homeTitles">
    <h2>Plantillas de Chatbots</h2>
    <?php
    $demosPorPagina = 3;
    include 'logicaPaginador.php'; 
    include 'listado.php'; 
    ?>
    <div>
        <a href="/demos" class="boton-verde-block contener-boton">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Diseñamos el chatbot que impulsará tu negocio</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="/contacto" class="boton-turquesa-block">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog homeTitles">
    <a href="/blogs"><h2>Nuestro Blog</h2></a> 
    <?php
        $blogsPorPagina = 3;
        include 'logicaPaginadorBlog.php'; 
        include 'listadoEntradas.php'; 
    ?>
    </section>
    <section class="testimoniales homeTitles">
        <h2 class="ultimoH2">Objetivo</h2>
        <div class="testimonial">
            <blockquote>
            Actualmente, los chatbots y la inteligencia artificial son herramientas esenciales para satisfacer las necesidades de las empresas y emprendedores. Pronto, se convertirán en una necesidad vital para mantenerse competitivos en el mercado. Por eso, estamos trabajando activamente para estar preparados y ayudar a otros a estarlo también. Nuestro objetivo es estar a la vanguardia de esta tecnología y asegurarnos de estar listos para el futuro."
            </blockquote>
            <p>–Equipo de Inbotscr</p>
        </div>
    </section>
</div>