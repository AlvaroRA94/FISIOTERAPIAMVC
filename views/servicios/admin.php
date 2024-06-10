<main class="contenedor seccion">

    <h1>Administrador de Servicios</h1>

    <?php
    if ($resultado) {
        $mensaje = mostrarNotificacion(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"> <?php echo s($mensaje) ?></p>
        <?php } ?>
    <?php } ?>


    <a href="/servicios/crear" class="boton boton-azul-inlineblock">Nuevo Servicio</a>
    <a href="/fisioterapeutas/crear" class="boton boton-azul-inlineblock">Nuevo Fisioterapeuta</a>

    <h2> Servicios </h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody><!-- Mostrar los Resultados-->
            <?php foreach ($servicios as $servicio) : ?>
                <tr>
                    <td><?php echo $servicio->id; ?></td>
                    <td><?php echo $servicio->titulo; ?></td>
                    <td><img src="/imagenes/<?php echo $servicio->imagen; ?>" class="imagen-tabla"></td>
                    <td><?php echo $servicio->precio; ?>€</td>
                    <td>
                        <form method="POST" class="w-100" action="/servicios/eliminar">
                            <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                            <input type="hidden" name="tipo" value="servicio">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/servicios/actualizar?id=<?php echo $servicio->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2> Fisioterapeutas </h2>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody><!-- Mostrar los Resultados-->
            <?php foreach ($fisioterapeutas as $fisioterapeuta) : ?>
                <tr>
                    <td><?php echo $fisioterapeuta->id; ?></td>
                    <td><?php echo $fisioterapeuta->nombre . " " . $fisioterapeuta->apellido; ?></td>
                    <td><?php echo $fisioterapeuta->telefono; ?></td>
                    <td>
                        <form method="POST" class="w-100" action="/fisioterapeutas/eliminar">
                            <input type="hidden" name="id" value="<?php echo $fisioterapeuta->id; ?>">
                            <input type="hidden" name="tipo" value="fisioterapeuta">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="/fisioterapeutas/actualizar?id=<?php echo $fisioterapeuta->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>