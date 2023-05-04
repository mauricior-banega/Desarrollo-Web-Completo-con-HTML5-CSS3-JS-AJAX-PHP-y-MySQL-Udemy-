<?php

//Si no deja conectarse, verificar en "Administrador de tareas en Windows", luego Servicios que MySQL57 no este Detenido, si lo esta Iniciar, y luego deberá quedar En ejecucion.

//En este caso que el puerto es distinto a donde se ejecuta el localhost, debo especificar el puerto "3308" que apunta a la dbo MySQL57.

$db = mysqli_connect('localhost','root','root','appsalon','3308');
$db->set_charset('utf8'); //Se agrega esto para que PHP reconozca las Ñ y acentos, ya que se veia mal.

if(!$db) {
    echo "Error en la conexion";
    exit; //Esto corta con las siguientes instrucciones. Sirve para no sobrecargar de errores siendo esto lo principal que necesitaremos apra trabajar.

} /* else {
    echo "Conexion exitosa";
}
 */


/* echo "Conexion exitosa"; */