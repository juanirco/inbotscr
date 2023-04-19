<?php 

use Model\Demo;
use Model\Blog;
?>
<main class="contenedor seccion">
        <h1>Página de Administrador</h1>
        <?php
            if ($resultado) {

                $mensaje = mostrarNotificacion( intval($resultado));
                if($mensaje) {?>
                <p class="alerta exito"><?php echo s($mensaje) ?></p>
                <?php }
            } ?>
        
    <pre> </pre>

     <h2>Blogs</h2>
    <a href="/blogs/crear" class="boton-verde-block contener-boton">Nuevo Blog</a>

    <table class="tBlogs">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Creador</th>
                <th>Accion</th>
            </tr>
        </thead>
            <tbody> <!--Mostrar los resultados -->
       
                <?php foreach( $blogs as $blog ): ?>
                <tr>
                    <td><?php echo $blog->id; ?> </td>
                    <td><?php echo $blog->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $blog->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $blog->administradoresId; ?></td>
                    <td>
                        <a href="/blogs/actualizar?id=<?php echo $blog->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        <form method="POST" action="blogs/eliminar">
                        <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
                        <input type="hidden" name="tipo" value="blog">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
     </table>
     <br>
     <hr></hr>

     <h2>Colaboradores</h2>

    <a href="/administradores/crear" class="boton-verde-block contener-boton">Nuevo Colaborador</a>
    
    <table class="tColabs">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido(s)</th>
                <th>Usuario</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody> <!--Mostrar los resultados -->
      
                <?php foreach( $administradores as $administrador ): ?>
                <tr>
                    <td><?php echo $administrador->id; ?> </td>
                    <td><?php echo $administrador->nombre; ?></td>
                    <td><?php echo $administrador->apellidos; ?></td>
                    <td><?php echo $administrador->usuario; ?></td>
                    <td><?php echo $administrador->email; ?></td>
                    <td><?php echo $administrador->rol; ?></td>
                    <td>
                        <a href="administradores/actualizar?id=<?php echo $administrador->id; ?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" action="administradores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $administrador->id; ?>">
                        <input type="hidden" name="tipo" value="administrador">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <hr></hr>
        <h2>Demos</h2>
    <a href="/demos/crear" class="boton-verde-block contener-boton">Nuevo Demo</a>

    <table class="tDemos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>CantIdioma</th>
                <th>Idiomas</th>
                <th>CantCanal</th>
                <th>Canales</th>
                <th>PagosDir</th>
                <th>GeoLoc</th>
                <th>Accion</th>
            </tr>
        </thead>
            <tbody> <!--Mostrar los resultados -->
       
                <?php foreach( $demos as $demo ): ?>
                <tr>
                    <td><?php echo $demo->id; ?> </td>
                    <td><?php echo $demo->titulo; ?></td>
                    <td>$<?php echo number_format($demo->precio, 2); ?></td>
                    <td><img src="/imagenes/<?php echo $demo->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $demo->cantIdiomas; ?></td>
                    <td><ul><?php $idiomasStr = explode(",",$demo->idiomas);
                    foreach($idiomasStr as $idioma): ?><li><?php echo $idioma;?></li> 
                    <?php endforeach;?></ul></td>
                    <td><?php echo $demo->cantCanales; ?></td>
                    <td>
                        <ul><?php if($demo->canales === 'facebook,instagram,whatsapp,website') 
                                {echo 'Todos';
                            } else {$canalesStr = explode(",",$demo->canales);
                                    foreach($canalesStr as $canal): ?>
                                    <li><?php echo $canal;?>
                                    <?php endforeach;?>
                                    </li> <?php }?>
                        </ul>
                    </td>

                    <td><?php echo $demo->pagosDirectos; ?></td>
                    <td><?php echo $demo->geoLoc; ?></td>
                    <td>
                        <a href="/demos/actualizar?id=<?php echo $demo->id; ?>" class="boton-amarillo-block">Actualizar</a>

                        <form method="POST" action="demos/eliminar">
                        <input type="hidden" name="id" value="<?php echo $demo->id; ?>">
                        <input type="hidden" name="tipo" value="demo">
                        <input type="submit" value="Eliminar" class="boton-rojo-block">
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
     </table>
</main>