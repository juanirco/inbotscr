<?php                
    
    // Filtro de búsqueda
    $blogsFiltrados = array_filter($blogs, function ($blog) {
        if (isset($_GET['buscar'])) {
            $buscar = strtolower($_GET['buscar']);
            $titulo = strtolower($blog->titulo);
            $texto = strtolower($blog->texto);
            if (strpos($titulo, $buscar) !== false || strpos($texto, $buscar) !== false) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    });

    
    // Total de blogsFiltrados a mostrar
    $totalBlogs = count($blogsFiltrados);
    // Número total de páginas
    $totalPaginas = ceil($totalBlogs / $blogsPorPagina);
    // Página actual
    $paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    // Asegurarse de que la página actual no sea menor que 1 o mayor que el número total de páginas
    if ($paginaActual < 1) {
        $paginaActual = 1;
    } elseif ($paginaActual > $totalPaginas) {
        $paginaActual = $totalPaginas;
    }
    // Índice del primer blog en la página actual
    $indicePrimerBlog = ($paginaActual - 1) * $blogsPorPagina;
    // Índice del último blog en la página actual
    $indiceUltimoBlog = $indicePrimerBlog + $blogsPorPagina;
    if ($indiceUltimoBlog > $totalBlogs) {
        $indiceUltimoBlog = $totalBlogs;
    }
    // Array de blogsFiltrados en la página actual
    $blogsEnPagina = array_slice($blogsFiltrados, $indicePrimerBlog, $blogsPorPagina);
