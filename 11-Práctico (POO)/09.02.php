<?php include 'includes/header.php';

//Como conectar a la BD con POO y MySqli mediante "SENTENCIAS PREPARADAS". Cambia un poco la sintaxis en comparacion a lo realizado en el práctico 09.php pero es mucho mas eficiente crear la consulta a la BD de esta manera.

//Las "SENTENCIAS PREPARADAS" , son mas seguras ya que evita problemas en la inyecccion de codigo SQL(hackeo); ademas de en caso de repetir consultas a la BD esta no pide al servidor que haga el trabajo sino que ya lo tiene alojado en memoria, dandole un mayor performance.

//Conexion a la BD
$db = new mysqli('localhost','root','','bienes_raices','3308');

//Creamos el query (consulta)
$query="SELECT titulo, imagen from propiedades";

//Lo preparamos
$stmt = $db->prepare($query); 

//Cambiamos query por "prepare"; y al resultado lo guardaremos en una variable que daremos de nombre $stmt (statement). Luego creamos la ejecucion, creamos la variable, asignamos el resultado e imprimimos.

//Lo ejecutamos
$stmt->execute();

//Creamos la variable
$stmt->bind_result($titulo, $imagen); //Guarda en una variable asignada el valor de la consulta. Pero aun no tendra informacion (será NULL); la tendrá una vez que hagamos el fetch.

//Asignamos el resultado
//$stmt->fetch();

//Imprimimos el resultado; mostrará solo un resultado. Para que muestre multiples veces, creamos el while donde incluiremos dentro el fecth. Entonces comentamos linea 25,28 y 29.
/* var_dump($titulo);
var_dump($imagen); */

while($stmt->fetch()):
    var_dump($titulo);
    var_dump($imagen);
endwhile;

include 'includes/footer.php';