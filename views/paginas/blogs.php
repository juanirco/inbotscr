<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>

    <?php
        include 'busqueda.php';
        // Número de blogs por página
        $blogsPorPagina = 6;
        include 'logicaPaginadorBlog.php'; 
        include 'listadoEntradas.php'; 
        include 'paginador.php'; 
    ?>
</main>