<main class="contenedor">
    <h1>Administrador de Bienes Raices</h1>

    <?php 
        if($resultado) :
            $mensaje = mostrarNotificacion(intval($resultado));
            if($mensaje) : ?>
                <p class="alerta exito"><?php echo $mensaje; ?></p>
            <?php endif; ?>
        <?php endif; ?>
    <a href="propiedades/crear" class="boton boton-verde">Nueva Propiedad</a>
    <a href="../vendedores/crear" class="boton boton-verde">Nuevo(a) Vendedor</a>
    <a href="../blogs/crear" class="boton boton-amarillo">Crear Blog</a>

    <h2>Propiedades</h2>

    <table class="propiedades"><!--Mostrar resultado consulta-->
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Precio</th>
            <th>imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($propiedades as $propiedad) : ?><!--$propiedades es la llave del array-->
        <tr>
            <td><?php echo $propiedad->id;?></td>
            <td><?php echo $propiedad->titulo;?></td>
            <td><?php echo $propiedad->precio;?></td>
            <td>
                <img src="/imagenes/<?php echo $propiedad->imagen;?>" 
                alt="imagen propiedad"
                class="imagen-tabla"></td>
            <td>
                <form method="POST" action="/propiedades/eliminar" class="w-100">
                    <input type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                    <input type="hidden" name="tipo" value="propiedad">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">                        
                </form>
                <a href="/propiedades/actualizar?id=<?php echo $propiedad->id;?>" class="boton-amarillo-block">Actualizar</a>
            </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>

    <h2>Vendedores</h2>

    <table class="propiedades"><!--Mostrar resultado consulta-->
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($vendedores as $vendedor) : ?><!--$vendedores es la llave del array-->
        <tr>
            <td><?php echo $vendedor->id;?></td>
            <td><?php echo $vendedor->nombre . ' ' . $vendedor->apellido;?></td>
            <td><?php echo $vendedor->telefono;?></td>
            <td>
                <img src="/imagenes/<?php echo $vendedor->imagen;?>" 
                alt="Perfil vendedor"
                class="imagen-tabla">
            </td>

            <td>
                <form method="POST" action="/vendedores/eliminar" class="w-100">
                    <input type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                    <input type="hidden" name="tipo" value="vendedor">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">                        
                </form>
                <a href="/vendedores/actualizar?id=<?php echo $vendedor->id;?>" class="boton-amarillo-block">Actualizar</a>
            </td>
        </tr>
        </tbody>
    <?php endforeach; ?>
    
    </table>

    <h2>Blogs</h2>

    <table class="propiedades"><!--Mostrar resultado consulta-->
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($blogs as $blog) : ?><!--$blogs es la llave del array-->
        <tr>
            <td><?php echo $blog->id;?></td>
            <td><?php echo $blog->titulo;?></td>
            <td><?php echo $blog->nombre?></td>
            <td><?php echo $blog->fecha;?></td>
            <td>
                <img src="/imagenes/<?php echo $blog->imagen;?>" 
                alt="imagen blog"
                class="imagen-tabla">
            </td>

            <td>
                <form method="POST" action="/blogs/eliminar" class="w-100">
                    <input type="hidden" name="id" value="<?php echo $blog->id;?>">
                    <input type="hidden" name="tipo" value="blog">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">                        
                </form>
                <a href="/blogs/actualizar?id=<?php echo $blog->id;?>" class="boton-amarillo-block">Actualizar</a>
            </td>
        </tr>
        </tbody>
    <?php endforeach; ?>
    
    </table>
    
</main>
