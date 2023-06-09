<main class="contenedor">
    <?php 
        include 'iconos.php';
    ?>
</main>

<section class="contenedor seccion">
    <h2>Casas y Depas en Ventas</h2>
        
    <?php
        include 'listado.php';
    ?>

    </div><!--contenedor-anuncios-->
    <div class="alignear-derecha">
        <a class="boton-verde" href="anuncios.php">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo al instante</p>
    <a href="contacto.php" class="boton-amarillo">
        Contactános
    </a>
</section>

<div class="contenedor seccion inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="texto entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/blog">
                    <h3>Terraza en el techo de tu casa</h3>
                </a>
                <p>Escrito el: <span class="informacion-meta">22/11/2022</span> por: <span class="informacion-meta">Admin</span></p>
                <p>
                    Consejos para construir una terraza en el techo de tu casa con los mejores materiales 
                    y ahorrando dinero
                </p>
            </div>
        </article><!--fin article-->

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="texto entrada blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="/blog">
                    <h3>Guía para la decoración de tu hogar</h3>
                </a>
                <p>Escrito el: <span class="informacion-meta">22/11/2022</span> por: <span class="informacion-meta">Admin</span></p>
                <p>
                    Maximiza el espacio en tu hogar con esta guía, aprende a combinar mueblesy colores 
                    para darle vida a tu espacio
                </p>
            </div>
        </article><!--fin article-->
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, 
                muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>-Sergio Charria</p>
        </div><!--testimonial-->
    </section>
</div>
