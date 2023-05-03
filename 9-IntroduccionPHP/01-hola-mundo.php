
<?php include 'includes/header.php'; ?>

<!--1. Hola Mundo en PHP y Extensiones de VSCode -->

<?php

echo "Hola Mundo";

?> <!-- Puede estar cerrado o no el codigo PHP. Se recomienda dejarlo abierto, a no ser que tenga codigo HTML y de nuevo otra apertura PHP que realizar -->

<br>

<!-- echo ("<br>") -No se recomienda generar HTML apartir de PHP ya que se carga el trabajo al servidor, cuando de igual manera podria hacerlo el navegador. -->

<?php echo("Hola Mundo"); /* Tambien podemos imprimir asi, sin error. Mostraremos otras. */

print("Hola Mundo");

print "Hola Mundo";

print_r("Hola Mundo"); /* Se utiliza para debuguear (imprime datos de variables/arreglos). */

var_dump("Hola Mundo"); /*Se utiliza tambien para debuguear (imprime datos/contenido e informacion extra de variables)*/

include 'includes/footer.php';?>