<main class="contenedor seccion">
        <h1>Actualizar Demo</h1>

        <a href="/admin" class="boton boton-amarillo">Volver</a>

        <?php 
        if(!empty ($errores)) {?>
        <?php foreach ($errores as $error): ?> 
                <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;
        }
        
        if (is_string($demo->idiomas)) {
        $idiomas_seleccionados = explode(',', $demo->idiomas);
        } else {
        $idiomas_seleccionados = array();
        }
            
        if (is_string($demo->canales)) {
        $canales_seleccionados = explode(',', $demo->canales);
        } else {
        $canales_seleccionados = array();
        }
            
        
        ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>

        <input type="submit" value="Actualizar Demo" class="boton boton-verde contener-boton">
        </form>
</main>