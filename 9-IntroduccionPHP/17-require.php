<!-- 19. Include y require -->

<?php 

include 'includes/header.php';

//Puede expresarse asi tambien: include ('includes/header.php');

//Tambien se puede utilizar require pero solo cuando debamos traer funciones o para conexiones a la base de datos, e include para traer templates.
 
//require 'includes/header.php';

//Existe tambien el require_once que lo que hace es requerir una sola vez el archivo, si existe ya entonces no se ejecuta.

require 'funciones.php'; //Traemos el archivo funciones para ejecutar posteriormente la f().

iniciarApp();


include 'includes/footer.php';