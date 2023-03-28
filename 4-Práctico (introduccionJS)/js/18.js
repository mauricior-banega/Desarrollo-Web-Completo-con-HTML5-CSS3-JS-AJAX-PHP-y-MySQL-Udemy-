/* Funciones con parametros y argumentos */

//Formato: Declaracion de la funcion

function sumar(numero1 = 0, numero2 = 0) { // numero1, 2 son parametros
    console.log(  numero2 + numero1);
}
sumar(10, 5); // Argumentos o los valores reales
sumar(3, 3);
sumar(3, 6);
sumar(1); /* (1) */

/* (1) - Parametros por default: Es cuando a esos parametros les asignamos un valor por defecto para que si en la llamada pasamos solo uno, funcione y no muestre undefined, sino el n1=1 y el n2=0. 

Podemos pensar en Facebook cuando en un perfil no cargamos todos los campos requeridos, entonces cargara esos campos vacios con un valor por defecto. Asi no tendremos un error.
*/

//Formato: Expresion de una funcion
const sumar2 = function(n1, n2) {
    console.log(n1 + n2);
}
sumar2(5, 10);