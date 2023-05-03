<!-- 13. for loops (while/do while/for/for each)-->

<?php include 'includes/header.php';

//Los "loops" nos permiten ejecutar codigo cierta cantidad de veces sin necedidad de repetir la sentencia muchas veces.


//While

$i = 0; //Inicializador

while($i <10) {
    
    /* echo $i . "<br>";  */  //Mostrará el nº + salto de linea, luego incrementa y suma +1.

    $i++; //Incremento
}

//Otra forma de expresar un While eliminando los corchetes + dos puntos (:) y endwhile al final, se puede usar esta sintaxis en caso que nuestro codigo utilize muchisimas llaves y presisemos ahorrarnos de ellas para no confundirnos. Unicamente existe en PHP, en JS no existe; ejemplificamos:

while($i <10):

    /* echo $i . "<br>";  */  //Mostrará el nº + salto de linea, luego incrementa y suma +1.

    $i++; //Incremento

endwhile;




//Do While

//1º Revisa el codigo, luego la condicion.
$i = 0; //Inicializador

do {

    /* echo $i . "<br>"; */
    $i++;

} while($i <10);



//For Loop

for($i=0; $i<10; $i++) {
    echo $i . "<br>";
}

/*  -De la misma forma que hay otra forma de expresar la sintaxis del While, para el Forloop tambien aplica. Quedaria asi:

for($i=0; $i<10; $i++):
    echo $i . "<br>";

endfor;

    -Tambien existe para in "if o enlse", aplicando la misma tecnica, finalizando con endif; pero si es un if anidado (para las entencias del medio) no es necesario poner endif;. Ademas las sentencias de else if, deberán estar pegadas (sin el espacio entre palabras).

*/

/*
Ejercicio de entrevista laboral:
-Imprime Fizz en nº que sean multiplos de 3.
-Imprime Buzz en nº que sean multiplos de 5.
-Imprime FIZZBuzz en nº que sean multiplos de 3 & 5.

*/

 echo "<br>";

for($i=1; $i<1000; $i++) {
    
    if( $i % 3 === 0 && $i % 5 === 0) {
        echo $i . " - Fizz Buzz <br>";
    }  else if( $i % 3 === 0) {
        echo $i . " - Fizz <br>";
    } else if ( $i % 5 === 0) {
        echo $i . " - Buzz <br>";
    }
    
}



//----------------For Each: Se ejecutará tantas veces tenga elementos el arreglo, no es necesario especificar ninguna condicion para que lo realice. Trabaja guardando el valor de cada elemento del array en una nueva variable, y generalmente su nombre será el mismo que el del array pero en singular, para mantener cierto ordenamiento.

$clientes = array('Pedro','Juan','Karen');

foreach( $clientes as $cliente ) {
    echo $cliente . "<br>";
}

/* Como en el práctico anterior for/if y while tenian la sintaxis sin los {}, para "foreach" tambien aplica. Ejemplificamos:

foreach( $clientes as $cliente ):
    echo $cliente . "<br>";
endforeach; */



//Como en PHP no existe .lenght para recorrer el arreglo en un "for loop" y ver su extencion (tamaño), se usan las siguientes sintaxis:

echo count($clientes);

echo "<br>";

echo sizeof($clientes);

echo "<br>";

//Un equivalente el foreach podria hacerse con un for loop común pero expresado de forma mas compleja

for($i =0; $i<count($clientes); $i++)
{
    echo $clientes[$i]."</br>";
}

//La diferencia es que en foreach no es necesario pasarla el tamaño a recorrer del array ni tampoco la posicion a imprimir a diferencia de este que si.


//---------------------------------------


//Aplicaremos foreach para arrays asociativos para que itere. Esa iteracion se hará a los valores del objeto y no a las llaves, soea imprime Juan/200/Premium y no nombre/saldo/tipo. 

$cliente = [
    'nombre'=>'Juan',
    'saldo'=>200,
    'tipo'=>'Premium'
];

foreach( $cliente as $valor ) {
    echo $valor . "<br>";
}

//Si queremos que imprima tambien nombre/saldo/tipo osea incluyendo las llaves esta es la sintaxis, se le agrega ($key =>) :

$cliente = [
    'nombre'=>'Juan',
    'saldo'=>200,
    'tipo'=>'Premium'
];

foreach( $cliente as $key => $valor ) {
    echo $key." - ". $valor . "<br>";
}


include 'includes/footer.php';