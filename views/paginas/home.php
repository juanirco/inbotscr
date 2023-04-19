
<main class="home">
    <div class="contenido-home">
        <h1>Chatbots y estrategias de chat marketing personalizadas para tu negocio.</h1>
    </div>  <!-- div contenido-header-->
</main>
<section class="contenedor homeTitles">
    <h2>¿Por qué elegirnos a nosotros?</h2>
    <?php include 'iconos.php' ?>
</section>

<section class="seccion contenedor homeTitles">
    <h2>Plantillas</h2>
    <?php
    $demosPorPagina = 3;
    include 'logicaPaginador.php'; 
    include 'listado.php'; 
    ?>
    <div class="alinear-boton">
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
        <h2>Nuestro Blog</h2>
    <?php
        $blogsPorPagina = 2;
        include 'logicaPaginadorBlog.php'; 
        include 'listadoEntradas.php'; 
    ?>
    </section>
    <section class="testimoniales homeTitles">
        <h2>Objetivo</h2>
        <div class="testimonial">
            <blockquote>
            "Pronto los chatbots no van a ser una alternativa sino una necesidad y estar preparados y preparar a otros para ese momento es un objetivo que vamos a cumplir." 
            </blockquote>
            <p>–Equipo de Inbotscr</p>
        </div>
    </section>
</div>