<!-- ACLARACIONES de "base.html":

    -Esta se utilizará en caso que se requiera agregar nuevas secciones esta será la base desde la que construimos cada una se las secciones (partiendo del modelo de index.html).
    -Esta no se incluye como archivo a la web definitiva, solo sirve en caso que solicitemos agregar osea crear nueva seccion, comenzar desde este modelo.

-->

<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Base (si se quisiera agregar otra sección)</h1>
    </main>

    <?php incluirTemplate('footer'); ?>