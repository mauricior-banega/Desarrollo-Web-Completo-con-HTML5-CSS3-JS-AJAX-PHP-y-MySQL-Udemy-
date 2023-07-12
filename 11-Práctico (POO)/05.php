<!-- 
Aclaraciones: 
-
 -->

 <?php include 'includes/header.php';

//Clases Abstractas: Son aquellas que no se pueden instanciar, solamente se pueden heredar. Por ejemplo en este caso diremos que la clase Transporte sea la clase abstracta por lo que no podremos generar instancias de esta, pero si crearemos para sus clases hijas.

abstract class Transporte {
    public function __construct(protected int $ruedas, protected int $capacidad){

    }

    public function getInfo() : string {
        return "El transporte tiene ". $this->ruedas . " y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }
}


class Bicicleta extends Transporte { 

    public function getInfo() : string {
        return "El transporte tiene ". $this->ruedas . " y una capacidad de " . $this->capacidad . " personas PERO NO GASTA GASOLINA";
    }
}

class Automovil extends Transporte { 
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $transmicion){
    }

    public function getTransmicion() : string {
        return $this->transmicion;
    }
}

//Dijimos que no usaremos la clase padre para ser instanciada pero de todas formas se puede. Ejemplificamos

/*     $transporte = new Transporte(1,3);
    echo $transporte->getInfo(); */

//Pero para que no se pueda hacer eso, debemos de poner unicamente "abstract" a la clase que deseemos, en este caso a transporte. Siguiente de hacerlo, veremos un error al querer ejecutar la instancia: Fatal error: Uncaught Error

//Comentamos entonces la instancia para que veamos que lo otro funciona.

echo "<hr>";

$bicicleta = new Bicicleta(2, 1);
echo $bicicleta->getInfo();
echo $bicicleta->getRuedas(); //Mostrará el 2

echo "<hr>";

$auto = new Automovil(4, 4,'Manual');
echo $auto->getInfo();
echo $auto->getTransmicion();

include 'includes/footer.php';