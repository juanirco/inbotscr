<!-- Navegación de páginas -->
<div class="paginacion">
    <ul>
        <!-- Botón de primera página -->
        <?php if($paginaActual == 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <li><a href="?pagina=1">&laquo;</a></li>
        <?php endif; ?>

        <!-- Botón de página anterior -->
        <?php if($paginaActual == 1): ?>
            <li class="disabled">&lt;</li>
        <?php else: ?>
            <li><a href="?pagina=<?php echo $paginaActual - 1 ?>">&lt;</a></li>
        <?php endif; ?>

        <!-- Números de páginas -->
        <?php for($i = 1; $i <= $totalPaginas; $i++): ?>
            <?php if($i == $paginaActual): ?>
                <li class="active"><?php echo $i ?></li>
            <?php else: ?>
                <li><a href="?pagina=<?php echo $i ?>"><?php echo $i ?></a></li>
            <?php endif; ?>
        <?php endfor; ?>

        <!-- Botón de página siguiente -->
        <?php if($paginaActual == $totalPaginas): ?>
            <li class="disabled">&gt;</li>
        <?php else: ?>
            <li><a href="?pagina=<?php echo $paginaActual + 1 ?>">&gt;</a></li>
        <?php endif; ?>

        <!-- Botón de última página -->
        <?php if($paginaActual == $totalPaginas): ?>
            <li class="disabled">&raquo;</li>
        <?php else: ?>
            <li><a href="?pagina=<?php echo $totalPaginas ?>">&raquo;</a></li>
        <?php endif; ?>
    </ul>
</div>