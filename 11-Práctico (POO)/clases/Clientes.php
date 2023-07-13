<?php

/* En esta carpeta/archivo  ejemplificamos el práctico 08.php: Autoload en Clases */

namespace App; //Aclaracion: El "namespace" dará error si la etiqueta de PHP (?php) tiene espacios en blanco tras ella.

class Clientes {
    public function __construct(){
        echo "Desde la clase de Clientes.php";
    }
}