<fieldset>
    <legend>Información General</legend>
    <label for="titulo">Título:</label>
    <input type="text" id="titulo" name="servicio[titulo]" placeholder="Título del Servicio" value="<?php echo s($servicio->titulo); ?>">

    <label for="precio">Precio:</label>
    <input type="number" id="precio" name="servicio[precio]" placeholder="Precio del Servicio" value="<?php echo s($servicio->precio) ?>">

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="servicio[imagen]">

    <?php if ($servicio->imagen) { ?>
        <img src="/imagenes/<?php echo $servicio->imagen; ?>" class="imagen-small">
    <?php } ?>

    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="servicio[descripcion]" placeholder="Resume brevemente las características del nuevo servicio..."><?php echo s($servicio->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Fisioterapeuta</legend>

    <select name="servicio[fisioterapeuta_id]" id="fisioterapeuta">
        <option selected value=""> -- Seleccione Fisioterapeuta -- </option>
        <?php foreach ($fisioterapeutas as $fisioterapeuta) { ?>
            <option <?php echo $servicio->fisioterapeuta_id === $fisioterapeuta->id ? 'selected' : ''; ?> value="<?php echo s($fisioterapeuta->id); ?>"> <?php echo s($fisioterapeuta->nombre) . " " . s($fisioterapeuta->apellido); ?> </option>
        <?php } ?>
    </select>
</fieldset>