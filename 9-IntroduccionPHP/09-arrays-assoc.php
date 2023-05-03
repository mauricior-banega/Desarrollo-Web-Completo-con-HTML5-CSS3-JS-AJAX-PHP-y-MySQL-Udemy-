<!-- 9. Arreglos asociativos o Associative Arrays en PHP -->

<?php include 'includes/header.php';

//Los arreglos asociativos de PHP son lo mas parecido a los objetos de JS. Accedemos a ellos no mediante indice sino de una "propiedad".

//Arreglo Asociativo: Contiene multiples datos (enteros/strings/otro array) dentro de la estructura. 

$cliente = [ 
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'premium'
    ]
    ];

//Sniped
/* echo "<pre>";
var_dump($cliente);
echo "</pre>"; */

//Para acceder a sus valores no lo haremos como un array normal mediante indice, sino que haremos lo sgte:

echo $cliente ['nombre']; //Juan

echo $cliente ['saldo']; //200

//echo $cliente ['informacion']; //Dará ERROR; se accede a un array de la sgte forma:

echo $cliente ['informacion']['tipo']; //Juan


//----------Añadimos más propiedades al arreglo
echo "<br>";

$cliente['codigo'] = 1231234565346; //Como esta propiedad nueva "codigo" no esta definida en el arreglo, entonces va a agregarla al último.

//Imprimimos
echo "<pre>";
var_dump($cliente);
echo "</pre>";




include 'includes/footer.php';