<main class="contenedor seccion">
        <h1>Actualizar Administrador</h1>

        <a href="/admin" class="boton boton-amarillo">Volver</a>

        <?php  if(!empty ($errores)) {?>
        <?php foreach ($errores as $error): ?> 
                <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;
        }?>

        <form class="formulario" method="POST">
        <?php include 'formulario.php'; ?>

            <input type="submit" value="Actualizar Administrador" class="boton boton-verde">
        </form>
    </main>