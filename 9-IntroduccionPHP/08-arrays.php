<!-- 8. Arreglos y Funciones para Arreglos en PHP -->

<!-- Aclaracion: Los objetos como se los conoce en JS y otros lenguajes de programacion, no existen como tal en PHP. Pero lo que mas se le parece a el, se conoce como arreglos asociativos. 
-Estos arreglos son lo mas importante del lenguaje ya que todas las consultas que realicemos a la dbo vendrán en formato de arreglo al sistema.


-->

<?php include 'includes/header.php';

//Arreglo puede expresarse asi
$carrito = ['Tablet','Television','Computadora'];

//O asi...
$carro = array('Tablet','Television','Computadora');

//Aclaracion secundaria: La 1º forma se usa mas con Larabel o XAMMP. Y la 2º con WordPress. De todas formas como dijimos; ambas son correctas.

//Útil para ver los contenidos de los arrays (imprecion + pre). Le llamaremos Sniped

echo "<pre>";
var_dump($carrito);
echo "</pre>";

//Aclaracion: Vemos que a la impresion var_dump ahora le agregamos dos echo <pre>, de apertura y cierre, que la contienen. Esto "crea" una impresion en formato mas ordenado del array. De esta forma es muy util de ver y entender las consultas sobre el contenido de un arreglo, que podramos hacer en el futuro en la dbo.

//Acceder a un elemento especifico de array
echo $carrito[1];


//---------------Agregar elementos-------------------

//Agregar un elemento nuevo al arreglo (conociendo su posición).
$carrito[3] = 'Nuevo Producto...';

//Agregar un elemento nuevo al final del arreglo (sin conocer su posición).
array_push($carrito, 'Audifonos');


//Agregar un elemento al inicio
array_unshift($carrito, 'Smartwatch');

echo "<pre>";
var_dump($carrito);
echo "</pre>";

//Como dijimos al principio, la otra forma de crear un array con los parentesis es de la sgte forma:

$clientes = array('Cliente 1','Cliente 2','Cliente 3');

echo "<pre>";
var_dump($clientes);
echo "</pre>";

//Y para acceder a un elemento, es la de misma forma
echo $clientes[1];


include 'includes/footer.php';