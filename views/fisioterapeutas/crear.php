<main class="contenedor seccion">
    <h1>Registrar Fisioterapeuta</h1>
    <a href="/admin" class="boton boton-azul-inlineblock">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form class="formulario" method="POST" action="/fisioterapeutas/crear" enctype="multipart/form-data">
        <?php include 'formulario.php'; ?>
        <input type="submit" value="Registrar Fisioterapeuta" class="boton boton-azul-block">
    </form>
</main>