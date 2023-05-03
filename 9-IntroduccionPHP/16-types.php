<!-- 16. Funciones que retornan valores "types". -->

<?php include 'includes/header.php';

/* declare(strict_types=1); */

/* (1) */
function usuarioAutenticado(bool $autenticado) : string
{
    if($autenticado) {

        
        return "El usuario esta autenticado";

        /* 
        Antes teniamos echo "El usuario esta autenticado"; y daba error. Eso es porque la funcion esta siendo declarada estrictamente por un tipo de variable : string. Pero un echo no retorna nada, por ello cambiamos los echo por return y ahi si sabra la f() que trabajamos con un String.
        -Entonces dejando claro esto, luego de los : lo que se indica es que tipo de valor especifico retornará.Puede ser bool/string/int/float/array etc... pero si no retorna un tipo de dato, sino un echo (osea nada) ponemos void, y funcionará, es decir tambien imprimira en este caso el mensaje en el html: 
        
            "El usuario esta autenticado"; 

            O 

            "No esta autenticado";

        -Pero si es void no podrá retornar un tipo de objeto, solo impresiones.
        
        */


    } else {

        echo "No esta autenticado";
    }
}

$usuario = usuarioAutenticado(true);

echo $usuario;

include 'includes/footer.php';

/* Aclaraciones:

1- Seguiremos ampliando lo referido a esta linea:

function usuarioAutenticado(bool $autenticado) : string

-Si tuvieramos que retornar uno de los 2 valores en null osea return null; podemos pasar que puede dar que retorne ese null y como estaba el string tambien, no dará erroes de codigo. Se codifica:

function usuarioAutenticado(bool $autenticado) : ? string

-Ahora en PHP 8 si tenemos un return tipo string y otro tipo int podemos tambien especificarlo, para que no de error de la sgte manera:

function usuarioAutenticado(bool $autenticado) : string|int

*/