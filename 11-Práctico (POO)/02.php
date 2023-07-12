<!-- 
Aclaraciones: En esta clase veremos como funciona el encapsulamiento aplicando modificadores de acceso. Cambiaremos los valores de las variables y veremos como pueden o no ser cambiadas/accedidas o modificadas dependiendo de cada caso (public/protected y private, de la que no explica a detalle ya que se comporta de forma muy similiar a protected cuando se tiene una sola clase). Private toma mayor efecto cuando se aplica herencia y se verá mas adelante la explicacion.

 -->

 <?php 

include 'includes/header.php';



//ENCAPSULACIÓN

class Producto {

    // Public - Se puede acceder y modificar en cualquier lugar (clase y objeto).
    //Protected - Se puede acceder/modificar únicamente en la clase (y no en el objeto). Esto se realiza mediante la creacion de un nuevo método que este dentro de la clase (get/set).
    //Private - Solo miembros de la misma clase puede acceder a el.

    public function __construct(protected string $nombre, public int $precio, public bool $disponible)
    {} //Codificacion equivalente a la anterior en PHP8

    //Creamos un método que muestre en una oración el resultado
    public function mostrarProducto() : void {
        echo "El Producto es: ".$this->nombre . " y su precio es de: " . $this->precio; 
    }

    
    //Acceder en Protected: Para que muestre la variable "protected" del constructor, es decir acceda a la variable "nombre", se crea un nuevo método, que luego se manda a llamar desde el objeto.

    public function getNombre() : string {
        return $this->nombre;
    }

    //Modificar en Protected: Para que muestre la variable "protected" del constructor, es decir acceda a la variable "nombre", se crea un nuevo método, que luego se manda a llamar desde el objeto.
    
    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }


}

$producto = new Producto('Tablet', 200, true);
// $producto->mostrarProducto();

echo $producto->getNombre();
$producto->setNombre('Nuevo Nombre');

echo "<pre>";
var_dump($producto);
echo "</pre>";

//------------------------------------------------------

$producto2 = new Producto('Monitor Curvo', 300, true);
// $producto2->mostrarProducto();

echo $producto2->getNombre();

/* echo "<pre>";
var_dump($producto2);
echo "</pre>"; */

include 'includes/footer.php';