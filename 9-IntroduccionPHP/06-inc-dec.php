<!-- 6. Incrementos en PHP -->

<?php include 'includes/header.php';

//Incremento en 1

$numero1 = 30;

//echo $numero1++; 

/* Imprime 30, porque el aumento sucede despues de imprimirlo. Ahora si lo ponemos antes si lo mostrará incrementado.*/

echo ++$numero1;

//Otro ejemplo, con Decremento en 1

$numero2 = 30;

echo --$numero2;

//Incremento de otras cantidades ej: de 5 en 5. Aplicado a $numero1. Si fuera decremento en 5 seria: $numero1 -= 5;

$numero1 += 5;

echo $numero1;


include 'includes/footer.php';