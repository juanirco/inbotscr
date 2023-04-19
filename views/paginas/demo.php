<main class="contenedor contenido-centrado">
    <a href="/demos" class="boton boton-amarillo">Volver</a>
    <div class="demoPage">
        <h1><?php echo $demo->titulo?></h1>

        <div class="centrarDP">
        <picture>
            <img loading="lazy" src="imagenes/<?php echo $demo->imagen?>" alt="demo.jpg" alt="Imagen de la demo">
        </picture>
            <p class="precio">$<?php echo number_format($demo->precio,2)?></p>
            <ul class="nombresIconos">
                        <li>Idiomas</li>
                        <li>Canales</li>
                        <li>Add-Ons</li>
                    </ul>
                    <ul class="iconos">
                    <?php
                    include 'iconosDemo.php'; 
                    ?>

            <p><?php echo $demo->descripcion?></p>
        </div>
        </div> <!-- demoPage Div -->
    </main>