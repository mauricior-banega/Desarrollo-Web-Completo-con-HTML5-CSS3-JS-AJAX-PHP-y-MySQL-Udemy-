<!-- 15. Funciones en PHP

Aclaraciones: Cambiare el nº del práctico a "15. Funciones en PHP" que esta en nº 16, para que no haya equivocaciones por la descompaginacion de la que hable en el anterior práctico.-->

<?php 

/* declare(strict_types=1); 
-Esta sentencia no funciona porque mi version de PHP es inferior a la 7 que es donde se inserta. En el video indica que sirve para que el codigo nos indique un error a medida que declaramos los valores, cuando una variable espera un tipo de declaracion especifica. Dirá algo como "Espera que ingreser int en vez de String". 
*/

include 'includes/header.php';



function sumar(int $numero1 =0 , int $numero2 = 0) 
//Si lo igualamos a 0, decimos que serán paramentros por default, si se da el caso de que en el llamado a la funcion, solo se pase un valor y no dos, creando error.

//Si le pasamos en el llamado un String dará error, si bien agregando int a cada parametro tambien dará error, PHP lo interpretará y sabra mostrando que por error en el tipo de la variable. Esto del "tipeo" osea de asignarle un tipo de dato a las variables antes en PHP no existia pero en la actualidad si se le puede asignar.

{
    
    echo $numero1 + $numero2;
    
}

/* sumar(10,20); */

/* sumar(10); */

sumar(10,'Hola');


/* Aclaracion:

-En video 18. Named Parameters en PHP explica que en PHP 8 se añadio una forma de nombrar el llamado a la funcion. Esto en caso que se desee cambiar la posicion de los valores distintos a como esta declarada la funcion. Ej aplicado en la f() anterior:
    
function sumar(int $numero1 =0 , int $numero2 = 0) 
{  
    echo $numero1 + $numero2;  
}

sumar($numero1 = 10, $numero2 = 20); -Asi seria como esta ya expresada, pero podemos invertir tambien la expresion.
sumar($numero2 = 10, $numero1 = 20); -De esta manera.



 */


include 'includes/footer.php';