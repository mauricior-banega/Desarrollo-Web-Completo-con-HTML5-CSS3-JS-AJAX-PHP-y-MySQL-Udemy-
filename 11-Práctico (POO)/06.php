
<?php include 'includes/header.php';

//Interfaces: Permiten agrupar un grupo de declaraciones de funciones pero no se van a implementar, es decir es como un plano de las funciones de una clase. Nos dice que hace una clase, que funciones tiene y que datos retorna pero no como lo hace.

//Se aplica creando como vemos debajo la interface, creando un nombre de clase al que haga referencia, dentro los métodos con los que trabajaremos de la clase y ademas en la clase a donde este dirigida agregar implements + el nombre de la interface.

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

include 'includes/footer.php';