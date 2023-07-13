<?php include 'includes/header.php';

//Como conectar a la BD con POO y MySqli

//Aclaraciones: En POO y MySqli como vemos cambia un poco la sintaxis de algunas consultas/declaraciones.

$db = new mysqli('localhost','root','','bienes_raices','3308');

//var_dump($db);

//En POO no es necesario crear la conexion sino que ya esta incluida en la instancia creada por $db.

$query="SELECT titulo from propiedades";
$resultado = $db->query($query);

//Tambien en POO no es necesario hacer mysqli_fetch_assoc($resultado) sino que ya podemos acceder a el mediante el objeto $resultado. 


//var_dump($resultado->fetch_assoc());

//Asi mostrará un resultado, entonces para que los muestre todos deberá iterar mediante while que crearemos abajo. Comento este

while($row = $resultado->fetch_assoc()):
    var_dump($row);
endwhile;


include 'includes/footer.php';