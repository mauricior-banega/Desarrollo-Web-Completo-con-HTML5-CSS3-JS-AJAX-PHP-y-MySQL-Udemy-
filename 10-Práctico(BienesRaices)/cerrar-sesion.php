<?php 

session_start();

//Podemos usar metodos PHP para eliminar la sesion, Ej: session_destroy y uncet. Pero es mas recomendable reescribir el valor del arreglo de sesion y ponerlo vacio.

$_SESSION = []; //Hacemos que sea vacio


header('Location: index.php');

//var_dump($_SESSION);



?>