<?php 

use Model\Demo;
?>

<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="demo[titulo]" placeholder="Titulo Demo" value="<?php echo s( $demo->titulo ); ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="demo[precio]" placeholder="Precio Demo" min="0" step=".01" value="<?php echo s( $demo->precio ); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" class="custom-file-input" id="imagen" name="demo[imagen]" accept="image/jpeg, image/png, image/webp">
    <?php if($demo->imagen) { ?>
        <img src="/imagenes/<?php echo $demo->imagen?>" class= "imagen-pequeña"
    <?php }?>

    <label for="descripcion">Descripcion</label>
    <textarea id="descripcion" name="demo[descripcion]"><?php echo s( $demo->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <label for="cantIdiomas">Cantidad de idiomas</label>
        <select id="cantIdiomas" name="demo[cantIdiomas]" required>
            <option value="" disabled selected>-- Seleccione --</option>
            <option value=1 <?php if ($demo->cantIdiomas == 1) echo 'selected'; ?>>1</option>
            <option value=2 <?php if ($demo->cantIdiomas == 2) echo 'selected'; ?>>2</option>

    </select>
    <legend>Idiomas Disponibles</legend>
    <div class="checkbox-idiomas">
        <label for="idioma-Esp">Español</label>
        <input type="checkbox" id="idioma-Esp" name="demo[idiomas][]" value="español" <?php if(isset($idiomas_seleccionados) && in_array('español', $idiomas_seleccionados)) echo 'checked'; ?>>

        <label for="idioma-Ing">Inglés</label>
        <input type="checkbox" id="idioma-Ing" name="demo[idiomas][]" value="ingles" <?php if(isset($idiomas_seleccionados) && in_array('ingles', $idiomas_seleccionados)) echo 'checked'; ?>>
    </div>
</fieldset>

<fieldset>
<legend>Canales Disponible</legend>

    <label for="cantCanales">Cantidad de canales</label>
        <select id="cantCanales" name="demo[cantCanales]" required>
            <option value="" disabled selected>-- Seleccione --</option>
            <option value=1 <?php if ($demo->cantCanales == 1) echo 'selected'; ?>>1</option>
            <option value=2 <?php if ($demo->cantCanales == 2) echo 'selected'; ?>>2</option>
            <option value=2 <?php if ($demo->cantCanales == 3) echo 'selected'; ?>>3</option>
            <option value=2 <?php if ($demo->cantCanales == 4) echo 'selected'; ?>>4</option>
    </select>
    <div class="checkbox-canales">
        <label for="canal-fb">Facebook</label>
        <input type="checkbox" id="canal-fb" name="demo[canales][]" value="facebook" <?php if(isset($canales_seleccionados) && in_array('facebook', $canales_seleccionados)) echo 'checked'; ?>>

        <label for="canal-ig">Instagram</label>
        <input type="checkbox" id="canal-ig" name="demo[canales][]" value="instagram" <?php if(isset($canales_seleccionados) && in_array('instagram', $canales_seleccionados)) echo 'checked'; ?>>

        <label for="canal-wp">Whatsapp</label>
        <input type="checkbox" id="canal-wp" name="demo[canales][]" value="whatsapp" <?php if(isset($canales_seleccionados) && in_array('whatsapp', $canales_seleccionados)) echo 'checked'; ?>>

        <label for="canal-web">Website</label>
        <input type="checkbox" id="canal-web" name="demo[canales][]" value="website" <?php if(isset($canales_seleccionados) && in_array('website', $canales_seleccionados)) echo 'checked'; ?>>
    </div>
</fieldset>

<fieldset>
<legend>Add-Ons Disponibles</legend>
    <label for="pagosDirectos">Pagos Directos</label>
        <select id="pagosDirectos" name="demo[pagosDirectos]" required>
            <option value="" disabled selected>-- Seleccione --</option>
            <option value="Si" <?php if ($demo->pagosDirectos == 'Si') echo 'selected'; ?>>Si</option>
            <option value="No" <?php if ($demo->pagosDirectos == 'No') echo 'selected'; ?>>No</option>
    </select>

    <label for="geoLoc">Geo-localizacion</label>
    <select id="geoLoc" name="demo[geoLoc]" required>
        <option value="" disable selected>-- Seleccione --</option>
        <option value="Si" <?php if ($demo->geoLoc === 'Si') { echo 'selected'; } ?>>Si</option>
        <option value="No" <?php if ($demo->geoLoc === 'No') { echo 'selected'; } ?>>No</option>
    </select> 


</fieldset>