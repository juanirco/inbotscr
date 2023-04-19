<?php
    // Lógica de búsqueda
    if (isset($_GET['busqueda'])) {
        $busqueda = trim($_GET['busqueda']);
        // Filtrar entradas de blog que contengan la palabra clave buscada
        $blogs = array_filter($blogs, function($blog) use ($busqueda) {
            return strpos(strtolower($blog->titulo), strtolower($busqueda)) !== false 
                || strpos(strtolower($blog->texto), strtolower($busqueda)) !== false;
        });
    }
?>


<div class="contenedor-blogs">
<?php foreach ($blogsEnPagina as $blog) : ?>
    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="imagenes/<?php echo $blog->imagen?>" type="image/webp">
                <img loading="lazy" src="imagenes/<?php echo $blog->imagen?>" alt="Texto Entrada Blog">
            </picture>
        </div>

        <div class="texto-entrada">
        <a href="blog?id=<?php echo $blog->id?><?php if (isset($_GET['buscar'])) echo '&buscar=' . urlencode($_GET['buscar']) ?>">
                <h3><?php echo $blog->titulo?></h3>
                <p class="informacion-meta">Escrito el: <span><?php echo $blog->fecha?></span> por: <span>Admin</span> </p>
            </a>
        </div>
    </article>

<?php endforeach; ?>
</div> <!-- contenedor-blogs  -->