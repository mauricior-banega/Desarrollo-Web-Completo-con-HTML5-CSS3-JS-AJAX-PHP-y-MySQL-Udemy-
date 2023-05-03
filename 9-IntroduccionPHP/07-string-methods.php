<!-- 7. Funciones para Strings en PHP -->

<?php include 'includes/header.php';


$nombreCliente = "   Juan Pablo   ";


//Conocer extension de un String

echo strlen($nombreCliente);

//"strln":Nos permite conocer la extencion de la variable, en este caso de 10 caracteres.

var_dump($nombreCliente);
//Tambien mediante var_dump podemos conocer la extencion de la variable.

//Eliminar espacios en blanco
$texto = trim($nombreCliente);
echo strlen($texto);

//Convertirlo a Mayusculas
echo strtoupper($nombreCliente);

//Convertirlo a Mayusculas
echo strtolower($nombreCliente);

//Aclracion: Sabemos que los correos da igual si al registrarse lo hacen escribiendolo en Mayus o Minus, pero sucede que no es asi en dbo. Cuando se haga la consulta a la base de datos para verificar si ese correo existe o no, dará que no existe, si se a registrado con el todo en Minusculas.

$mail1="correo@correo.com";
$mail2="Correo@correo.com";

//Vemos que mail2 la "C" es mayuscula y se intentara acceder con el no nos dejaria. Si se compueda con "vardump" dará (false).

var_dump(($mail1 === $mail2)); // bool(false)

//Esto sucede por lo que explicamos arriba. Ahora si quisieramos que en la dbo no tengamos problemas de este tipo, se pasa ambos valores de las variables a Minusculas para evitar errores de ese estilo.

var_dump((strtolower($mail1) === strtolower($mail2))); //bool(true)

//-------------------------

//Reemplazo de valor 

echo str_replace('Juan', 'J', $nombreCliente);

//Revisar si un string existe o no.

echo strpos($nombreCliente, 'Juan'); //Devuelve la posicion en la que se encuentra el valor de la variable declarada. En este caso dará 3, ya que Juan comienza 3 espacios luego de las comilllas en la declaracion original (arriba).

echo "<br>";

//Concatenar diferentes variables a diferentes string de texto. Esta, es la que mas se utiliza, a diferencia de la 2da que tambien dejaremos expresada.


$tipoCliente = "Premium";

echo "El Cliente ". $nombreCliente. " es ". $tipoCliente; //Concatena mediante punto (.)

//Otra forma de concatenar lo mismo es la sgte, similar a Template String de JS. Se aplican llaves dobles, las simples no funcionan en este formato.

echo "<br>";

echo "El Cliente {$nombreCliente} es {$tipoCliente}";



include 'includes/footer.php';