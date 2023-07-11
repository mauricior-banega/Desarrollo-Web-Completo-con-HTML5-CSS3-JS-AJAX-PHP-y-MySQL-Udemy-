<?php

require 'app.php';

function incluirTemplate(string $nombre, bool $inicio = false) {
    /* include "includes/templates/${nombre}.php";
    Podemos simplificar a un mas la ruta, especificando los datos de la ruta templates que esta en app.php, que será llamado medainte require fuera de la F(). Comentamos entonces el ejemplo anterior para ver el cambio. */

    /* Pasamos el nombre del segmento en la F() en este caso header que llegará del llamado realizado en index.php y el valor de inicio, que será false (valor por default) pero que cambiará solamente para el index a true donde si alli hará que se vea la imagen del header que existe solo en ese documento porque agrega la clase inicio en el header. 
    
    -Se especifican los paramentros nombre e inicio el tipo de dato que reciben, de esta manera quedará mas limpio y claro el codigo creado. */

    include TEMPLATES_URL. "/${nombre}.php";
    
   
}

//Funcion que ejecuta la autenticacion de sesion a la que se mandará a llamar al inicio de cada documento.
function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];    

    if($auth) {
        return true;
    } 

    return false;
}


/* function cerrarSesionHeader(int $cerrarsesionheader) {

    if($cerrarsesionheader === 1) {
        header('Location: index.php/');
    } else if ($cerrarsesionheader === 2) {
        header('Location: ../index.php/');
    } else {
        header('Location: ../../index.php/');
    }
} */

