<?php include 'includes/header.php';

//Composer: Es un administrador de dependecias para PHP, permitirá instalar librerias (por Ej pagar con Paypal). Equivalente a npm (de Node) pero en PHP.

/* Descargamos e instalamos: URL https://getcomposer.org/ 
-Ir a Download, luego Composer.Setup.exe y descargamos. Ponemos que es seguro porque nos aparece una advertencia.
-Al descargar ejecutamos como Administrador e instalamos para todos los usuarios (opcion RECOMENDADA), luego Siguiente etc.
-Abrimos PowerShell, escribimios composer y si aparecen todos los comandos significa que ya instalo correctamente.
-Luego en VSC abrimos en terminal integrado y ejecutamos composer init. Creamos todo lo que solicita, en correo ponemos nombre + <correo@correo.com osea cualquiera>, le damos a todo no hasta donde pide "Do you confirm generation" ahi damos "yes".
-De esta manera nos crea un archivo "composer.json".

-ACLARACION: Cerrar VSC porque si ejecutamos comando sin hacerlo dará error, osea no lo reconocera. Tras esto si funcionará.

-Abrimos el "composer.json" y en donde apare el "require" completamos de esta manera:

"require": {},
    "autoload": {
        "psr-4": {
            "App\\" : "./clases"
        }
    }
-Una vez hecho ejecutamos el sgte comando en terminal integrado: composer update.
-Hecho esto nos va a crear una carpeta llamada "vendor" que suplira la funcionalidad que tenia el autoload que teniamos de nombre "mi_autoload" & spl_autoload_register('mi_autoload); .

-Y listo, hecho esto creamos un require hacia "vendor/autoload.php".

*/

// require 'clases/Clientes.php';
// require 'clases/Detalles.php';

require 'vendor/autoload.php'; //<--------AUTOLOAD creado mendiante COMPOSER

use App\Clientes; //Tambien podemos quitar la barra desde de la instancia usandola mediante use en este sitio.
use App\Detalles;

//Este método buscará las clases indicandole donde buscar, mediante Composer llevaremos al siguiente nivel esta funcionalidad

/* function mi_autoload($clase){
    
    $partes = explode('\\', $clase); 
    require __DIR__ . '/clases/' . $partes[1] . '.php';
}

spl_autoload_register('mi_autoload'); */

$detalles = new Detalles();
$clientes = new Clientes();

include 'includes/footer.php';