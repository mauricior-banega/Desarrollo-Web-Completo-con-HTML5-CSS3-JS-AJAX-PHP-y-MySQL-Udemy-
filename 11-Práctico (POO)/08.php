<?php include 'includes/header.php';

//Autoload de Clases: Manejaremos distintas clases en diferentes archivos.

//Incluiremos las otras clases: Podemos incluir mediante require si, pero no es recomendado ya que muchas veces tienen que ser cargados en un orden en especifico para no generar errores o si tenemos muchos puede alargar y hacer confuso el codigo. Para ello usamos "autoload" de PHP. Comento los require


/* require 'clases/Clientes.php';
require 'clases/Detalles.php';
*/



//Creamos el método que a cargar en el autoload

//Aclaracion; $clase alojará el nombre de la clase que se manda a instanciar, esto lo realiza cuando PHP lee cuales son las clases que se mandan a instanciar, al hacerlo luego nos permite crear la ruta de las clases que usa mi_autoload.

function mi_autoload($clase){
    //echo $clase;

    //echo __DIR__ . '/clases/' . $clase . '.php'; (Para ver como queda la ruta)

    require __DIR__ . '/clases/' . $clase . '.php';
}

spl_autoload_register('mi_autoload');

$detalles = new Detalles();
$clientes = new Clientes();

include 'includes/footer.php';