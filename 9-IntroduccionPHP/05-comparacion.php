<!-- 5. Comparadores en PHP -->

<?php include 'includes/header.php';


$numero1= 20;
$numero2= 30;
$numero3= 30;
$numero4= "30";

var_dump($numero1 > $numero2); //bool(false)

echo "<br>";

var_dump($numero1 < $numero2); //bool(true)

echo "<br>";

var_dump($numero1 >= $numero2); //bool(false)

echo "<br>";

var_dump($numero1 <= $numero2); //bool(true)

echo "<br>";

var_dump($numero2 == $numero3); //bool(true)

echo "<br>";

var_dump($numero2 == $numero4); //bool(true). 

//Pero porque si uno es String y el otro nº?. Esto es porque usamos doble = y analiza el valor unicamente, si usasemos triple = osea un operador (mas estricto) va a analizar el tipo de dato también.

echo "<br>";

var_dump($numero2 === $numero4); //bool(false). 


/* Otro tipo de comparador en PHP es el: <=> 
-Basicamente analiza el 1º termino, si es menor al 2º da (-1), si es = dá (0) y si es el 2º es menor que el 1º dá (1).*/

echo "<br>";

var_dump($numero1 <=> $numero2); //=(-1) -Si izq es menor. 

echo "<br>";

var_dump($numero2 <=> $numero3); //=(0) -Si izq/der es son iguales.

echo "<br>";

var_dump($numero2 <=> $numero1); //=(1) -Si der es menor. 


include 'includes/footer.php';