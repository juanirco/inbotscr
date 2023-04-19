<?php                
    
    // Filtro de búsqueda
    $demosFiltrados = array_filter($demos, function ($demo) {
        if (isset($_GET['buscar'])) {
            $buscar = strtolower($_GET['buscar']);
            $titulo = strtolower($demo->titulo);
            $descripcion = strtolower($demo->descripcion);
            if (strpos($titulo, $buscar) !== false || strpos($descripcion, $buscar) !== false) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    });

    // Total de demosFiltrados a mostrar
    $totalDemos = count($demosFiltrados);
    // Número total de páginas
    $totalPaginas = ceil($totalDemos / $demosPorPagina);
    // Página actual
    $paginaActual = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
    // Asegurarse de que la página actual no sea menor que 1 o mayor que el número total de páginas
    if ($paginaActual < 1) {
        $paginaActual = 1;
    } elseif ($paginaActual > $totalPaginas) {
        $paginaActual = $totalPaginas;
    }
    // Índice del primer demo en la página actual
    $indicePrimerDemo = ($paginaActual - 1) * $demosPorPagina;
    // Índice del último demo en la página actual
    $indiceUltimoDemo = $indicePrimerDemo + $demosPorPagina;
    if ($indiceUltimoDemo > $totalDemos) {
        $indiceUltimoDemo = $totalDemos;
    }
    // Array de demosFiltrados en la página actual
    $demosEnPagina = array_slice($demosFiltrados, $indicePrimerDemo, $demosPorPagina);
