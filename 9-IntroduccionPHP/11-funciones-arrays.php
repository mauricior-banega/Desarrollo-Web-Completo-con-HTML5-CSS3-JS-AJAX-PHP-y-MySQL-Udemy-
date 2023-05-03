<!-- 11. Revisar si un elemento existe en un array y otros métodos
 -->

 
<?php include 'includes/header.php';

// "in_array" - Buscar elementos en un arreglo

$carrito = ['Tablet','Computadora','Television'];

var_dump( in_array('Tablet', $carrito) ); //Dará true; ya que existe.

var_dump( in_array('Audifonos', $carrito) ); //Dará false; ya que no existe.

//Generalmente podremos ver un "in_array" dentro de un if o de una funcion. Nosotros lo expresamos dentro de var_dump, tambien puede ser un echo, para imprimirlo y poder verlo (mostrando 0/1 en vez de false/true). Si solo indicaramos la sentencia in_array no mostraá nada porque no imprime.


//-------Ordenar elementos de un arreglo: "sort"/"rsort"

$numeros = array(1,3,4,5,1,2);

sort($numeros); //Ordena de menor a mayor
rsort($numeros); //Ordena de mayor a menor


//Imprimimos
echo "<pre>";
var_dump($numeros);
echo "</pre>";


//-------Ordenar elementos de un arreglo asociativo

$cliente = array(
    'saldo' => 200,
    'tipo' => 'Premium',
    'nombre' => 'Juan'
);

asort($cliente); //Ordena por "valores" de las propiedades, osea 1º los nº y luego los strings alfabeticamente. La "a" indica que se hará a un array tipo asociativo. 

arsort($cliente); //Inversa del anterior, ordena por "valores" de las propiedades, 1º las variables alfabeticamente y luego los nº. 

ksort($cliente); /* En cambio ksort ordena por las "llaves" alfabeticamente. */

krsort($cliente); /* otra variante de "ksort" y es "krsort". Esta ordena las llaves alfabeticamente a la inversa, es decir mostrando las que comienzen con las letras mas cercanas a la Z. */

echo "<pre>";
var_dump($cliente);
echo "</pre>";




include 'includes/footer.php';