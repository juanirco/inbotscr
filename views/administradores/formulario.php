<fieldset>
    <legend>Informacion General</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="administrador[nombre]" placeholder="Nombre administrador" value="<?php echo s( $administrador->nombre ); ?>">

    <label for="apellidos">Apellido</label>
    <input type="text" id="apellidos" name="administrador[apellidos]" placeholder="Apellido administrador" value="<?php echo s( $administrador->apellidos ); ?>">

    <label for="usuario">Usuario</label>
    <input type="text" id="usuario" name="administrador[usuario]" placeholder="Nombre de usuario" value="<?php echo s( $administrador->usuario ); ?>">

    <label for="email">Email</label>
    <input type="email" id="email" name="administrador[email]" placeholder="Email" value="<?php echo s( $administrador->email ); ?>">

    <label for="password">Contraseña</label>
    <input type="password" id="password" name="administrador[password]" placeholder="Escribe acá tu contraseña" value="<?php echo s( $administrador->password ); ?>">

    <label for="rol">Rol</label>
    <input type="text" id="rol" name="administrador[rol]" placeholder="Tipo de rol de  usuario" value="<?php echo s( $administrador->rol ); ?>">
</fieldset>

</fieldset>