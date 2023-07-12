<!-- 

Aclaraciones:
1* - Constructor en PHP: Podemos crear objetos de la clase e de forma mas práctica usando "constructores"; estos son funciones o métodos que se van a mandar a llamar cada vez que se cree una nueva instancia. En PHP no es necesario que tengan el mismo nombre que la clase como en JS, inician con doble guion bajo.

2* -Toda esa sintaxis "comentada" en compatible en PHP 5/7 pero fue aun mas acortada en PHP 8. Dejo la simplificacion de esta sin comentar, nosotros usaremos dependiendo sea la version de PHP con la que trabajemos la que corresponda aplicar.
 -->

<?php 

//declare(strict_types=1); Ya no funciona esla linea

include 'includes/header.php';



//Definir una clase

class Producto {
/*  
    (2*)
    public $nombre;
    public $precio;
    public $disponible;

    public function __construct(string $nombre, int $precio, bool $disponible) //1*
    {   
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->disponible = $disponible;
        //echo "Desde el Constructor";
    }
    
     */

    public function __construct(public string $nombre, public int $precio, public bool $disponible)
    {} //Codificacion equivalente a la anterior en PHP8

    //Creamos un método que muestre en una oración el resultado
    public function mostrarProducto(){
        echo "El Producto es: ".$this->nombre . " y su precio es de: " . $this->precio; 
    }



}

$producto = new Producto('Tablet', 200, true);
$producto->mostrarProducto(); //Llamamos al método para que mande a mostrar el mensaje.

/* $producto = new Producto(); //Instancia de la clase

$producto->nombre = 'Tablet';
$producto->precio = 200;
$producto->disponible = true; */

echo "<pre>";
var_dump($producto);
echo "</pre>";

$producto2 = new Producto('Monitor Curvo', 300, true);
$producto2->mostrarProducto();

/* $producto2 = new Producto(); //Otra instancia de la clase
$producto2->nombre = 'Monitor Curvo';
$producto2->precio = 300;
$producto2->disponible = true; */

echo "<pre>";
var_dump($producto2);
echo "</pre>";

include 'includes/footer.php';