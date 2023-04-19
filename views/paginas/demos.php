<main class="contenedor">
        <section class="seccion contenedor">
            
        <div class="demos">
            <h1>Plantillas de Chatbots</h1>
            <p>¡Elige nuestras plantillas personalizables y comienza a mejorar la interacción con tus clientes hoy mismo!</p>
        </div>

            <?php
                include 'busqueda.php';
                // Número de demos por página
                $demosPorPagina = 12;
                include 'logicaPaginador.php'; 
                include 'listado.php'; 
                include 'paginador.php'; 
            ?>
</main>