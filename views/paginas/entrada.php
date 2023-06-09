<main class="contenedor seccion contenido-centrado">
    <h1>
        <?php echo $blog->titulo; ?>
    </h1>

    <div class="contenido-entrada">
        <picture>
            <source srcset="imagenes/<?php echo $blog->imagen; ?>" type="image/webp">
            <source srcset="imagenes/<?php echo $blog->imagen; ?>" type="image/jpeg">
            <img src="imagenes/<?php echo $blog->imagen; ?>" alt="imagen de la propiedad">
        </picture>
        <p>Escrito el: <span class="informacion-meta"><?php echo $blog->fecha; ?></span> por: <span class="informacion-meta"><?php echo $blog->nombre ?></span></p>
    </div>
    <p>
        <?php echo $blog->descripcion ?>
    </p>
</main>