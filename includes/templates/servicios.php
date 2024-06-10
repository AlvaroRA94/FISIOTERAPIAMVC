<?php

use App\Servicio;

if ($_SERVER['SCRIPT_NAME'] === "/fisioterapia/servicios.php") {
    $servicios = Servicio::all();
} else {
    $servicios = Servicio::get(3);
}

?>

<div class="contenedor-anuncios">
    <?php foreach ($servicios as $servicio) { ?>
        <div class="anuncio">
            <img loading="lazy" src="/fisioterapia/imagenes/<?php echo $servicio->imagen; ?>" alt="servicio">

            <div class="contenido-anuncio">
                <h3><?php echo $servicio->titulo; ?></h3>
                <p><?php echo substr($servicio->descripcion, 0, 80); ?>...</p>
                <p class="precio"><?php echo $servicio->precio; ?> €</p>

                <a href="servicio.php?id=<?php echo $servicio->id; ?>" class="boton-azul-block">
                    Más Información
                </a>
            </div><!--.contenido-anuncio-->
        </div><!--anuncio-->
    <?php } ?>
</div> <!--.contenedor-anuncios-->