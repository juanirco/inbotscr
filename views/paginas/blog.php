<main class="contenedor seccion contenido-centrado">
    <a href="/blogs" class="boton boton-amarillo">Volver</a>
    <div class="blogPage">
        <div class="centrarDP">
            <h1><?php echo $blog->titulo?></h1>
            <picture>
                <source srcset="imagenes/<?php echo $blog->imagen?>" type="image/webp">
                <img loading="lazy" src="imagenes/<?php echo $blog->imagen?>" alt="Texto Entrada Blog">
            </picture>
            <h4>Escrito el: <span><?php echo $blog->fecha?></span> por: <span>Admin</span> </h4>

            <div class="resumen-blog">
                <p><?php echo $blog->texto?></p>
            </div>

        </div>
    </div> <!-- blogPage Div -->
</main>