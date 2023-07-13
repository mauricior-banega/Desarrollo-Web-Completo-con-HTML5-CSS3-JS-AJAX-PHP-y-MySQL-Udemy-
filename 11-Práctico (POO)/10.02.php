<?php include 'includes/header.php';

//Consultar a la BD con POO y PDO con SENTENCIA PREPARADA

//Aclaracion: PDO nos permite conectarnos a multiples bases de datos (12), a diferencia de MySqli que solo nos permite conectar a bases de datos MYSQL. Para hacerlo PDO creamos una instancia con la clase PDO.

$db = new PDO('mysql:host=localhost; dbname=bienes_raices; port=3308','root','');

//En el práctico no explica pero como la BD bienes_raices esta en puerto 3308 este debe de estar definido mediante port=3308 dentro de la primera declaracion.

//Creamos el query
$query="SELECT titulo, imagen from propiedades";

//Lo preparamos
$stmt = $db->prepare($query);

//Lo ejecutamos
$stmt->execute();

/* $resultado = $stmt->fetch();  */

//*La diferencia en PDO es que aqui el resultado se aloja en un arreglo, mientras que en POO el resultado se mostraba en una variable creada con "bind_result". 

//*Otra alcaracion: cambiaremos de fetch a fetchAll para que nos traiga todos los resultados pero veremos que traera el arreglo asociativo y el numerico Ej titulo posicion 0 etc. Entonces crearemos de esto: $resultado = $stmt->fetch();

//*A esto mostrando solo el arreglo asociativo y comento el anterior: 

//Obtenemos los resultados
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Iteramos
foreach($resultado as $propiedad):
    echo $propiedad['titulo'];
    echo "<br>";
    echo $propiedad['imagen'];
    echo "<br>";
endforeach;

/* echo '<pre>';
var_dump($resultado); 
echo '<pre>'; */

include 'includes/footer.php';