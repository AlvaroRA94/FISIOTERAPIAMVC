<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if ($mensaje) { ?>
        <p class="alerta exito"> <?php echo $mensaje; ?> </p>
    <?php } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Complete la Información a Continuación:</h2>

    <form class="formulario" action='/contacto' method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="apellido1">Primer Apellido</label>
            <input type="text" placeholder="Primer Apellido" id="apellido1" name="contacto[apellido1]" required>

            <label for="apellido2">Segundo Apellido</label>
            <input type="text" placeholder="Segundo Apellido" id="apellido2" name="contacto[apellido2]">

            <label for="email">E-mail</label>
            <input type="email" placeholder="Email" id="email" name="contacto[email]" required>

            <label for="telefono">Teléfono</label>
            <input type="tel" placeholder="Teléfono" id="telefono" name="contacto[telefono]">

            <label for="mensaje">Comenta Brevemente Tu Caso:</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Adicional</legend>

            <p> Cómo desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]" required>

                <label for="contactar-email">E-mail</label>
                <input type="radio" value="email" id="contactar-email" name="contacto[contacto]" required>
            </div>

            <p>Si eligió teléfono, elija la fecha y la hora</p>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">

        </fieldset>

        <input type="submit" value="Enviar" class="boton-azul-block">
    </form>
</main>