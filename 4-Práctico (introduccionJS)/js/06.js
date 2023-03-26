// Objeto Math

let resultado;

resultado = Math.PI;
resultado = Math.round(2.5); /* Redondea */
resultado = Math.ceil(2.1); // Ceil siempre redondea hacia arriba
resultado = Math.floor(2.9); // Floor siempre redondea hacia abajo
resultado = Math.sqrt(144); /* Raiz cuadrada */
resultado = Math.abs(-200); /* Convierte en positivo el nº */
resultado = Math.min( 3, 5, 1, 8 , 2, 10 ); /* Indica cual es el minimo nº de un listado */
resultado = Math.max( 3, 5, 1, 8 , 2, 10 ); /* Indica cual es el maximo nº de un listado */
resultado = Math.random(); /* Genera un nº aleatorio (casi siempre crea nº menores a 0)*/

resultado = Math.floor( Math.random() * 30 ); 
/* Convinamos ambas sentencias para generar nº aleatorios mayores a 0, de manera que podamos usarlo en lo que se parezca mas a casos reales en los que se pueda aplicar el random. */

console.log(resultado); 