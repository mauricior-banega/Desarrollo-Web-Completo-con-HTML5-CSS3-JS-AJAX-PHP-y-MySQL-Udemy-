<?php include 'includes/header.php';

//Autoload de Clases: Manejaremos distintas clases en diferentes archivos.

//Incluiremos las otras clases: Podemos incluir mediante require si, pero no es recomendado ya que muchas veces tienen que ser cargados en un orden en especifico para no generar errores o si tenemos muchos puede alargar y hacer confuso el codigo. Para ello usamos "autoload" de PHP. Comento los require

//Luego explica como usar el "namespace" que sirve para crear una clases con el mismo nombre, ya que no lo permitiria. Se agrega namespace + nombre que será Ej App. Para instanciar y que sepa PHP a cual se hace referencia si tuvieramos 2 iguales, agrademos en el instanciamiento el nombre App, quedando Ej $detalles = new App\Detalles();

//Ahora surge un problema cuando $clases aloja el nombre de la ruta para realizar la inclusion de las clases que explicamos arriba. Sucede que $clases busca el nuevo nombre que incluye Ej App\Detalles y debemos eliminar la barra invertida y la palabra App, ya que no es un camino de ruta. Para ello creamos una buscada de la barra, la alojará en un Array y extraeremos la posicion de ese arreglo que contiene Detalle y lo concatenamos en la ruta nuevamente.

/* require 'clases/Clientes.php';
require 'clases/Detalles.php';
*/



//Creamos el método que a cargar en el autoload

//Aclaracion; $clase alojará el nombre de la clase que se manda a instanciar, esto lo realiza cuando PHP lee cuales son las clases que se mandan a instanciar, al hacerlo luego nos permite crear la ruta de las clases que usa mi_autoload.

function mi_autoload($clase){
    //echo $clase;

    $partes = explode('\\', $clase); 
    
    //Buscara la "barra invertida". La ponemos doble porque entre las comillas dobles da error, si ponemos 2 barras busca solo 1 y no da error. Buscará nombres que esten junto a esa barra y creará el array en 2 posiciones, donde tomaremos la que aparece el nombre de la instancia y se guadara en $partes[1].

    /* var_dump($partes[1]);

        echo "<br>"; 
    */

    //require __DIR__ . '/clases/' . $clase . '.php';

    require __DIR__ . '/clases/' . $partes[1] . '.php';
}

spl_autoload_register('mi_autoload');



class Clientes {
    public function __construct(){
        echo "Desde 08.php que contiene los clientes";
    }
}

$detalles = new App\Detalles();
$clientes = new App\Clientes();
$clientes2 = new Clientes();


include 'includes/footer.php';