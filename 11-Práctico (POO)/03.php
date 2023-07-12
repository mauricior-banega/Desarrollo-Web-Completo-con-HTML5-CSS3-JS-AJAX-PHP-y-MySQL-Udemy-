<!-- 
Aclaraciones: 
-En el ultimo de las ejemplificaciones explica como segun corresponda mostrará el contenido de la variable imagen (donde en un caso esta vacio y en el otro no)
 -->

 <?php 

include 'includes/header.php';

//Métodos y Atributos Estaticos

class Producto {

    public $imagen;
    public static $imagenPlaceholder = "Imagen.jpg";

    //Atributo Estatico: Veremos que podemos leerlo mediante la creacion de un método tambien, que retorne la variable, agregando self y :: a la sentencia. LÑuego la mandamos a llamar 

    //public static $imagen = "Imagen.jpg";

    public function __construct(protected string $nombre, public int $precio, public bool $disponible, string $imagen)
    {
        if($imagen) {
            self::$imagenPlaceholder = $imagen;
        }
    }



    //Método Estatico: No es necesario acceder a el creando una instancia de la clase. Veremos como podemos acceder a el y cual es la sintaxis.

    public static function obtenerProducto(){
        echo "Obteniendo datos del Producto...";
    }

    public static function obtenerImagenProducto(){
        //return self::$imagen;
        return self::$imagenPlaceholder;
    }



    
    public function mostrarProducto() : void {
        echo "El Producto es: ".$this->nombre . " y su precio es de: " . $this->precio; 
    }

    public function getNombre() : string {
        return $this->nombre;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }


}

/* echo Producto::obtenerProducto();
echo Producto::obtenerImagenProducto(); */

$producto = new Producto('Tablet', 200, true, '');

echo $producto->obtenerImagenProducto();

// $producto->mostrarProducto();

/* echo $producto->getNombre();
$producto->setNombre('Nuevo Nombre'); */

echo "<pre>";
var_dump($producto);
echo "</pre>";

//------------------------------------------------------

$producto2 = new Producto('Monitor Curvo', 300, true, 'monitorcurvo.jpg');

echo $producto2->obtenerImagenProducto();

// $producto2->mostrarProducto();

/*echo $producto2->getNombre();

 echo "<pre>";
var_dump($producto2);
echo "</pre>"; */

include 'includes/footer.php';