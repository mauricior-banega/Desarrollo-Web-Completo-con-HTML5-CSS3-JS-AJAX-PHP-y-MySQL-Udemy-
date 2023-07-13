<?php include 'includes/header.php';

//Consultar a la BD con POO y PDO (ejemplificamos sin sentencia preparada). En el 10.02.php lo haremos con la sentencia preparada

//Aclaracion: PDO nos permite conectarnos a multiples bases de datos (12), a diferencia de MySqli que solo nos permite conectar a bases de datos MYSQL. Para hacerlo PDO creamos una instancia con la clase PDO.

$db = new PDO('mysql:host=localhost; dbname=bienes_raices; port=3308','root','');

//En el práctico no explica pero como la BD bienes_raices esta en puerto 3308 este debe de estar definido mediante port=3308 dentro de la primera declaracion.

$query="SELECT titulo from propiedades";

//Consultar la BD
$propiedades = $db->query($query)->fetch(); 
//Podemos incluir el fetch luego de creada la consulta, en la misma linea. Hay varios fetch que podemos hacer: fetchAll (traera todos los datos que contenga titulo, fetchColumn (traera solo la columna), fecthObject (que traerá el resultado como un objeto)).

var_dump($propiedades); //Traerá solo un resultado, en este caso no lo hace pero si quisieramos como lo hicimos antes creamos el while con el fetch.

include 'includes/footer.php';