
<?php include 'includes/header.php';

//Polimorfismo

interface TransporteInterfaz {
    public function getInfo() : string;
    public function getRuedas() : int;
}

class Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad){

    }

    public function getInfo() : string {
        return "El transporte tiene ". $this->ruedas . " y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }
}


class Automovil extends Transporte implements TransporteInterfaz {
    public function __construct(protected int $ruedas, protected int $capacidad, protected string $color){

    }

    public function getInfo() : string {
        return "El transporte AUTO tiene ". $this->ruedas . " y una capacidad de " . $this->capacidad . " personas y tiene el color ". $this->color ; 
    }

    //Veremos que esta clase es unica de Automovil y que no es necesario que este en la interfaz declarada, puede existir solo en esta clase hija y ser igualemnte utilizada por auto.

    public function getColor() : string {
        return "El color es: ". $this->color; 
    }
}

echo "<pre>";
var_dump($transporte=new Transporte(8, 20));
var_dump($auto=new Automovil(4, 4, 'Rojo'));
echo "<pre>";

echo $transporte->getInfo();
echo "<br>";

echo $auto->getInfo();
echo "<br>";

echo $auto->getColor();

include 'includes/footer.php';