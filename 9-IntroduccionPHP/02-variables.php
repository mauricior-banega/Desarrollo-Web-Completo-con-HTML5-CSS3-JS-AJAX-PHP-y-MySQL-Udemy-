
<!-- Variables y Constantes en PHP -->

<?php include 'includes/header.php';



$nombre = "Juan"; /* Variables en PHP comienzan con signo dólar. */

/* $nombre = "Juan 2"; Podemos reasignar valor a la variable*/

$_nombre = "Juan";

echo $nombre;

echo "<br>";

var_dump($nombre);

define("constante", "Este es el valor de la constante"); /* Asi como const permite que se no pueda cambiar el valor de su contenido, define tambien. No es una variable en si misma, sino que es un identificador. Si pretendemos imprimirlo dará error: echo $constante.
Por lo que si queremos imprimirlo sera sin el simbolo de dólar: echo constante.
*/
echo "<br>";

echo constante;

/* Otra forma de crear variables constantes es una similar a JS pero no es usada casi, veremos mas comunmente la otra, ejemplifico. */
echo "<br>";

const constante2= "Hola 2";
echo constante2;


/* Podemos crear variables de 2 palabras, siendo la primera la preferida y mas comun. Pero es cierto que la 2da en PHP suele tambien usarse, aplicando guin bajo. */
echo "<br>";

$nombreCompleto = "Pedro";
$nombre_completo = "Pedro";



include 'includes/footer.php';

