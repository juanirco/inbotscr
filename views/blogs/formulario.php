<?php 

use Model\Blog;
?>

<fieldset>
    <legend>Informacion General</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="blog[titulo]" placeholder="Titulo Blog" value="<?php echo s( $blog->titulo ); ?>">

    <label for="imagen">Imagen</label>
    <input type="file" class="custom-file-input" id="imagen" name="blog[imagen]" accept="image/jpeg, image/png, image/webp">
    <?php if($blog->imagen) { ?>
        <img src="/imagenes/<?php echo $blog->imagen?>" class= "imagen-pequeña"
    <?php }?>

    <label for="texto">Texo Entrada</label>
    <textarea id="texto" name="blog[texto]"><?php echo s( $blog->texto); ?></textarea>
</fieldset>
<legend>Creador de Entrada</legend>
    <select name="blog[administradoresId]"  id="creador">
        <option value="" selected="">--Selecciona un creador--</option>
        <?php foreach($administradores as $administrador) {?>
            <option <?php echo $blog->administradoresId === $administrador->id ? 'selected' :  '' ?> value="<?php echo  s( $administrador->id ); ?>"> <?php echo s( $administrador->nombre ) . ' ' . s( $administrador->apellidos );?> </option>
        <?php }?>
    </select> 

</fieldset>