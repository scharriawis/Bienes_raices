<main class="contenedor seccion contenido-centrado">
    <h1>Nuestro Blog</h1>

    <?php foreach($blogs as $blog) :?>

    <article class="entrada-blog">
        <div class="imagen">
            <picture>
                <source srcset="imagenes/<?php echo $blog->imagen; ?>" type="image/webp">
                <source srcset="imagenes/<?php echo $blog->imagen; ?>" type="image/jpeg">
                <img loading="lazy" src="imagenes/<?php echo $blog->imagen; ?>" alt="texto entrada blog">
            </picture>
        </div>
        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $blog->id; ?>">
                <h3>
                    <?php echo $blog->titulo; ?>
                </h3>
            </a>
            <p>Escrito el: <span><?php echo $blog->fecha; ?></span> por: <span><?php echo $blog->nombre; ?></span></p>
            <p>
                <?php echo $blog->descricpion ?>
            </p>
        </div>
    </article><!--fin article-->

    <?php endforeach; ?>

</main>