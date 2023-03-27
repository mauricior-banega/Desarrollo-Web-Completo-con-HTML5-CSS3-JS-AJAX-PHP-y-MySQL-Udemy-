// Arreglos o Arrays

const numeros = [10,20,30,40,50];

/* const meses = ['Enero', 'Febrero', 'Marzo','Abril','Mayo']; */

/* Un arreglo puedo escribirse como vemos arriba, pero sino tambien podremos ver en otras sintaxis crearla mediante un constructor:
        const numeros = new Array (10,20,30,40,50);
 */

// Acceder a los valores de un arreglo. Si se quiere recorrer todo el arreglo ver mas abajo "foreach".
// console.log(numeros[0]);
// console.log(numeros[1]);
// console.log(numeros[2]);
// console.log(numeros[3]);
// console.log(numeros[4]);

/* Mostrar los valores y mediante una tabla tambien la posicion de cada valor.

    console.table(numeros);

*/

// Conocer la extensión de un arreglo: Indicará cuantos elementos hay (en este caso 5).
// console.log(meses.length);

/* Recorrer un arreglo en JS y mostrar todos los valores de este uno a uno; para ello se utiliza un muy utilizado método: "forEach" que significa: Por cada uno de ellos. */

// numeros.forEach( function(numero) {
//     console.log(numero);
// })

/* ------------------------------------------------------------------------------------
    Agregar elementos al arreglo
 */

//numeros[5]=60; 
//- Esta forma es una de las que se puede usar aunque es mas complicada, ya que tenemos que conocer cual es el indice ultimo para poder agregar y no borrar un valor existente. Lo mas conveniente y mas comun es utilizar un metodo que se llama "push". Agrega el elemento independientemente de cuanto mida.

numeros.push(60,70,80); // Agrega al final del arreglo.
numeros.unshift(-10,-20,-30); // Agrega al inicio del arreglo.

console.table(numeros);

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'];

// meses.pop(); // Elimina el último elemento.
// meses.shift(); // Elimina el primer elemento.

// meses.splice(2, 1); //Elimina tambien pero se pasan 2 valores, el 1º es la posicion del elemento y 2º cuantos elementos apartir de ese quieres eliminar.
// console.table(meses); 



// Rest Operator o Spread Operator 

const nuevoArreglo = ['Junio', ...meses]; 
console.log(nuevoArreglo);

/* Este seria un reemplazo digamos mejorado que el método push para agregar elementos. Solo que difiere ya que estaremos creando otro agreglo con los mismos elementos del arreglo meses y añadiendo 'Junio' en este nuevo. De esa manera funciona, añadiendo spread operator a la formula. Aclaracion; si quieremos pasar el elemento al ultimo del arreglo codificamos 1º ...meses y luego 'Junio'. Ahora si lo queremos al comienzo, es como esta codificado osea al principio, de esta manera usamos la funcionalidad de ubicacion de elementos push/unshift. */