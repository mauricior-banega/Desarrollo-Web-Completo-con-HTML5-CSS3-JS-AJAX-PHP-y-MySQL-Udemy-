<?php

function conectarDB(): mysqli {
    $db = mysqli_connect('localhost','root','','bienes_raices','3308');

     if(!$db) {
        echo "Error no se pudo conectar";
        exit; //Para que no revele cierta info privada se corta la conexion para que no se muestre error alguno.
    } 

    return $db;
}