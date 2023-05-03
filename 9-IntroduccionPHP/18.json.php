<!-- 20. json_encode y json_decode -->

<?php include 'includes/header.php';

/* -JSON sirven para comunicar entre plataformas datos de una dbo o PHP a JS/IOs/Android/React etc.  

-Esto funciona mediante json_encode, pasando el arreglo de una dbo o PHP por ejemplo a String, ejemplificamos con un arreglo asociativo que creamos anteriormente que emula una dbo.
*/

$productos = [
    [
        'nombre'=>'Tablet', 
        'precio'=>200,
        'disponible'=>true
    ],

    [
        'nombre'=>'Televisión 24"', 
        'precio'=>300,
        'disponible'=>true
    ],

    [
        'nombre'=>'Monitor Curvo', 
        'precio'=>400,
        'disponible'=>false
    ]
];

echo "<pre>";
var_dump($productos);


//Lo que muestra var_dump JS no lo puede leer, entonces lo pasamos a JSON.

//Cremoa una variable que llamaremos $json, que sera igual a la funcion de codificar llamado json_encode y dentro pasamos el arreglo.

//Luego creamos un var_dump para el json para poder ver el String que crea.

/* $json = json_encode($productos); */

$json = json_encode($productos, JSON_UNESCAPED_UNICODE);

var_dump($json);

//Mostrará: string(176) "[{"nombre":"Tablet","precio":200,"disponible":true},{"nombre":"Televisi\u00f3n 24\"","precio":300,"disponible":true},{"nombre":"Monitor Curvo","precio":400,"disponible":false}]"

//Veremos que como Televisión tiene acento muestra en ese segmento un error de conversion. Entonces hay que especificarlo mediante JSON_UNESCAPED_UNICODE. De esta manera si se verá correctamente. existen muchas conversiones que se pueden aplicar, pero para este caso del acento sirve el que explicamos.

//Mostrará: string(172) "[{"nombre":"Tablet","precio":200,"disponible":true},{"nombre":"Televisión 24\"","precio":300,"disponible":true},{"nombre":"Monitor Curvo","precio":400,"disponible":false}]"

//Ahora, vamos a consumirlo en JS convirtiendo este String a un arreglo. Lo realizamos mediante json_decode. Y mostramos mediante var_dump nuevamente. Y cerramos el </pre> para que ordene correctamente todos los var_dump contenidos.


$json_array = json_decode($json);

var_dump($json_array);

echo "</pre>";

include 'includes/footer.php';