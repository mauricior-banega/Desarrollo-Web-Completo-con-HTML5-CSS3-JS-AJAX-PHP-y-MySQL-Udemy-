/* Funciones en JavaScript */

// Formato: Declaración de Función
sumar();
function sumar() {
    console.log(10 + 10);
}



// Formato: Expresión de la función
sumar2();
const sumar2 = function() {
    console.log( 3 + 3);
}


//IIFE: Es un tipo de F() se declara, pero se manda a llamar (invoca) ella misma. Común de ver en codigos de los plugins jQuery. Sirven para que no se mezclen/colisionen las variables de en un archivo, ya que es posible acceder a una F() de otro archivo JS en un mismo proyecto.

(function(){
    console.log('Esto es una funcion');
})();

