<!-- 
Aclaraciones: 
-
 -->

<?php include 'includes/header.php';

//Herencia de Clases

class Transporte {
    public function __construct(protected int $ruedas, protected int $capacidad){

    }

    public function getInfo() : string {
        return "El transporte tiene ". $this->ruedas . " y una capacidad de " . $this->capacidad . " personas ";
    }

    public function getRuedas() : int {
        return $this->ruedas;
    }
}

//Clase hija de "Transporte", por lo tanto hereda metodos y atributos. Es decir que si creamos un objeto de tipo Bicicleta y le pasamos que tenga 2 ruedas y capacidad 1 lo mostrará sin problema. Aunque este vacia hasta el momento 

class Bicicleta extends Transporte { 

    //Creamos un nuevo método muy similar al del padre y agregamos una sola aclaracion unicamente. Para poder hacer eso debemos ponerle el mismo nombre que el método definido en la clase padre.
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

$bicicleta = new Bicicleta(2, 1);
echo $bicicleta->getInfo();
echo $bicicleta->getRuedas(); //Mostrará el 2

echo "<hr>";

$auto = new Automovil(4, 4,'Manual');
echo $auto->getInfo();
echo $auto->getTransmicion();

include 'includes/footer.php';