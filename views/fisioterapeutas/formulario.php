<fieldset>
    <legend> Información General </legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="fisioterapeuta[nombre]" placeholder="Nombre del Trabajador/a" value="<?php echo s($fisioterapeuta->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="fisioterapeuta[apellido]" placeholder="Apellido del Trabajador/a" value="<?php echo s($fisioterapeuta->apellido); ?>">
</fieldset>

<fieldset>
    <legend> Información Adicional</legend>

    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="fisioterapeuta[telefono]" placeholder="Teléfono del Trabajador/a" value="<?php echo s($fisioterapeuta->telefono); ?>">
</fieldset>