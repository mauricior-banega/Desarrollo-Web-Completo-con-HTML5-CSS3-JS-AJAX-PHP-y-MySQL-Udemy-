/* forEach y map

-"forEach": Sirve para ir iterando es decir ir elemento a elemento recorriendo el array por ejemplo y en este caso imprimirá cada nombre del objeto carrito.
-Como podemos observar es mas practico y corto en codigo usar este metodo que un for o un while para recorrer un array.
 */

const carrito = [
    { nombre: 'Monitor 20 Pulgadas', precio: 500 },
    { nombre: 'Televisión 50 Pulgadas', precio: 700 },
    { nombre: 'Tablet', precio: 300 },
    { nombre: 'Audifonos', precio: 200 },
    { nombre: 'Teclado', precio: 50 },
    { nombre: 'Celular', precio: 500},
    { nombre: 'Bocinas', precio: 300},
    { nombre: 'Laptop', precio: 800}
];

// ForEach (para iterar o mostrar en consola)
carrito.forEach( producto => console.log(producto.nombre));



// map (para crear un nuevo arreglo)

/* "map": Realiza la misma tarea que forEach pero la diferencia es que este se utiliza cuando queremos crear un nuevo arreglo apartir de uno ya creado, porque justamente crea un nuevo arreglo apartir de este. 
 -A diferencia que forEach se usa para mostrar valores de un arreglo o contar sus elementos.
*/
const arreglo2 = carrito.map( producto => `${producto.nombre} - ${producto.precio}`);

console.log(arreglo2);