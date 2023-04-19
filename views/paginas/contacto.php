<main class="contacto">
    <?php if($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <picture class="fotobg">
        </picture>
    <div class="seccion contenedor">
        <h2>¿Cómo Podemos Ayudarte?</h2>

        <form class="formulario" action="/contacto" method="POST">
            <div class="contenedor">
            <fieldset>
                <legend>Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>
            </fieldset>
        
            <fieldset>
                <legend>Motivo de Contacto</legend>

                <label for="opciones"></label>
                <select id="opciones" name="contacto[opciones]" required>
                    <option value="" disabled selected>-- Seleccione una opción --</option>
                    <option value="Cotizacion">Quiero una cotizacion</option>
                    <option value="FAQ">Quiero acalarar consultas</option>
                    <option value="Otro">Otro motivo</option>
                </select> 
                <div id="motivoContacto"></div>
            </fieldset>
            <fieldset>
                <legend>Metodo de contacto de preferencia</legend>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" value="Telefono" id="contactar-telefono" name="contacto[contactar]" required>

                    <label for="contactar-email">Email</label>
                    <input type="radio" value="Email" id="contactar-email" name="contacto[contactar]" required>
                </div>

                <div id="contacto"></div>

            </fieldset>

                <input type="submit" value="Enviar" class="boton-verde contener-boton">
            </div>
        </form>
    </div>
</main>

