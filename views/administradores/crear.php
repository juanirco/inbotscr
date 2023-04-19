<main class="contenedor seccion">
        <h1>Registrar Administrador</h1>

        <a href="/admin" class="boton boton-amarillo">Volver</a>

        <?php  if(!empty ($errores)) {?>
        <?php foreach ($errores as $error): ?> 
                <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;
        }?>

        <form class="formulario" method="POST" action="/administradores/crear" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>

            <input type="submit" value="Crear administrador" class="boton boton-verde contener-boton">
        </form>
    </main>