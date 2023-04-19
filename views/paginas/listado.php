<?php
    // Lógica de búsqueda
    if (isset($_GET['busqueda'])) {
        $busqueda = trim($_GET['busqueda']);
        // Filtrar entradas de demo que contengan la palabra clave buscada
        $demos = array_filter($demos, function($demo) use ($busqueda) {
            return strpos(strtolower($demo->titulo), strtolower($busqueda)) !== false 
                || strpos(strtolower($demo->descripcion), strtolower($busqueda)) !== false;
        });
    }
?>

<div class="contenedor-demos">
<?php foreach ($demosEnPagina as $demo) : ?>
            <div class="demo">
                <picture>
                    <img loading="lazy" src="imagenes/<?php echo $demo->imagen?>" alt="demo.jpg">
                </picture>

                <div class="contenido-demo">
                    <h3><?php echo $demo->titulo?></h3>
                    <p><?php echo $demo->descripcion?></p>
                    <p class="precio">USD $<?php echo number_format($demo->precio,2)?></p>
                    <ul class="nombresIconos-caracteristicas">
                        <li>Idiomas</li>
                        <li>Canales</li>
                        <li>Add-Ons</li>
                    </ul>
                    <ul class="iconos-caracteristicas">
                    <?php
                    include 'iconosDemo.php'; 
                    ?>

                    <a href="demo?id=<?php echo $demo->id?>" class="boton-amarillo-block">Ver Plantilla</a>
               </div> <!-- contenido-demo  -->
            </div> <!-- demo  -->
            <?php endforeach; ?>
</div> <!-- contenedor-demos  -->