<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $servicio->titulo; ?></h1>

    <img loading="lazy" src="/imagenes/<?php echo $servicio->imagen; ?>" alt="imagen del servicio">

    <div class="resumen-elemento" style="padding:2.5rem;">
        <p class="precio"><?php echo $servicio->precio; ?> €</p>
        <p><?php echo $servicio->descripcion; ?></p>
    </div>
</main>