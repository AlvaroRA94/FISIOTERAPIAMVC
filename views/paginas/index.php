<main class="contenedor seccion">
    <h1>Nuestros Valores</h1>
    <?php include 'iconos.php'; ?>
</main>

<section class="seccion contenedor">
    <h2>Encuentra el Servicio que Necesitas</h2>

    <?php
    include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="/servicios" class="boton-azul-block">Todos los Servicios</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Contacta con Nosotros</h2>
    <p>Estás a un solo paso de sentirte mejor</p>
    <a href="/contacto" class="boton-azul-block">Contáctanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>¿En qué me ayuda la Fisioterapia?</h4>
                    <p class="informacion-meta">Escrito el: <span>20/05/2024</span> por: <span>Gonzalo Roldán</span>
                    </p>

                    <p>
                        Un rápido repaso por todos y cada uno de los beneficios principales que nos brinda este
                        campo de la salud en el bienestar físico y mental.
                    </p>
                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>Causas Principales del Dolor Lumbar</h4>
                    <p class="informacion-meta">Escrito el: <span>19/04/2024</span> por: <span>Gonzalo Roldán</span>
                    </p>

                    <p>
                        Vamos a echar un vistazo a todas aquellas prácticas que tenemos muy arraigadas en el día a
                        día y que, sin darnos cuenta, nos pueden llegar a producir lesiones muy molestas. </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Opiniones de Clientes:</h3>

        <div class="testimonial">
            <blockquote>
                El personal me trató excelentemente. Muy buena atención, estoy empezando a notar
                mejoría después de una lesión en la espalda. Muy recomendable.
            </blockquote>
            <p>- José Fernández</p>
        </div>
    </section>
</div>