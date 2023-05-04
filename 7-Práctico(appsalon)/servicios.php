<?php

/*  Aclaracion:
-Al práctico lo realizabamos simulando una dbo mediante servicios.json pero que en el actual práctico nº20 ya creamos la conexion real con la dbo "appsalon". Por lo que quitaremosla ruta de ese fetch hacia ese archivo y lo haremos al que extrajimos de la dbo real. Como vimos, el fetch + json_encode, sirven para consumir una consulta para ser leida en PHP y JS. Pasan en este caso los datos del array en String(con la estructura de un json).

-Los pasos son, crear este archivo servicios.php que servira para poner en el fetch. El fetch esta en app.js (linea 137)

const resultado = await fetch ('./servicios.json');  


Y que ahora será:

const resultado = await fetch ('./servicios.json');

-Siguiente este archivo recibirá los servicios en formato PHP obtenido de la funcion "obtenerServicios" que obtuvimos en archivo funciones.php. Como vimos las f() podemos traerlas en PHP mediante require e include a los templates. Especificamos la ruta en el require.

-Luego indicamos que la funcion obtenida sea igual a una variable "le vamos a poner el mismo nombre que la variable que retorna, para no despistarnos ($servicios)".

-Imprimimos lo obtenido */


require 'includes/funciones.php';

$servicios = obtenerServicios();

/* var_dump($servicios); */


/* echo json_encode($servicios); 
-Aclaracion: Esta linea por si solo no funciona, es decir hay que bajar un plugin de terceros para verlo o bien codificar un header que pueda interpretarlo y mostrarlo en el navegador, como lo es JSON View, es una extencion de Chrome que permite poder verlo.
-Lo instalamos y funciona, osea se logra ver pero no ordenado.
-Probare con crear un header para visualizarlo, esta recomendacion la vi en Github, ruta: https://es.stackoverflow.com/questions/446159/problema-con-el-echo-json-encodeservicios

Dice:

En PHP la función json_encode puede recibir en parámetro varias constantes, entre ellas: JSON_PRETTY_PRINT que sirve para agregar espacios en blanco en los datos devueltos para formatearlos.

Esta constante está disponible a partir de PHP 5.4.0.

Para resolver un posible problema de codificación con respecto a la ñ, uno de los pasos importantes es indicar un charset adecuado a la conexión, cosa que ya haces aquí:

$db = mysqli_connect('localhost', 'root', '', 'appsalon');
$db->set_charset('utf8');

*/


header("Content-type: application/json; charset=utf-8");
echo json_encode($servicios, JSON_PRETTY_PRINT);

