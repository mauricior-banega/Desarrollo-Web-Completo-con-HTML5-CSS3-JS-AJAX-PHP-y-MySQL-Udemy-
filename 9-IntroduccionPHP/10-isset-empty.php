<!-- 10. isset() y empty() -->

<?php include 'includes/header.php';

$clientes = [];
$clientes2 = array();

$clientes3 = array('Pedro','Juan','Karen');

//-------

$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200
];

//Funcion "Empty": Servira para saber si un arreglo esta vacio o no.

var_dump(empty($clientes)); // Dará bool(true); ya que esta vacio.

var_dump(empty($clientes3)); // Dará bool(false); ya que no esta vacio.

var_dump(empty($clientes2)); // Dará bool(true); ya que también esta vacio.



/* Funcion "Isset": Servira para saber si un arreglo esta creado, osea una propiedad esta definida.
-Crearemos un "clientes4" que no existe para demostrar. */
echo "<br>";

var_dump(isset($clientes4)); // Dará bool(true); ya que esta vacio.

// Y si vemos los otros 3 ya creados todos darán bool(true).
var_dump(isset($clientes));
var_dump(isset($clientes2));
var_dump(isset($clientes3));



//Tambien podemos ver mediante "isset" si alguna propiedad existe en un arreglo.

var_dump(isset($cliente['nombre']) ); //Dará bool(true) porque esa propiedad existe.

var_dump(isset($cliente['codigo']) ); //Dará bool(false) porque esa propiedad no existe.

//Otra forma de hacerlo mendiante el indice, pero no es muy utilizado.
var_dump(isset($clientes3[100]) ); //Dará bool(false) porque esa propiedad no existe, osea no hay un indice de posicion nº 100 (solo hay 0, 1 y 2).

include 'includes/footer.php';