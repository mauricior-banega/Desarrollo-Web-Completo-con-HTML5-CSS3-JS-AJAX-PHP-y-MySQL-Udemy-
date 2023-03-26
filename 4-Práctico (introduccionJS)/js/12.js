
// "use strict"; // Correr JS en modo estricto

// Objetos Methods
const producto = {
    nombreProducto : "Monitor 20 Pulgadas",
    precio: 300,
    disponible: true
}

/* Explicamos: Sabemos que las variables deben tener definido el tipo, sea let/var/const etc, y particularmente const tiene como propiedad que no puede ser modificada (agregar/eliminar/cambiar valor) una vez creada. Pero si creamos un objeto tipo const, y deseemos modificar sus atributos SI podremos hacerlo. Ahora, si NO queremos que eso suceda, es que se utiliza el método: "Object.freeze", donde especificaremos a que objeto hacer referencia. Como vemos, la imagen que intentamos agregar no se podrá aplicar.
*/

/*  Object.freeze(producto); 
    producto.imagen = "imagen.jpg";

  Cuando ejecutamos el archivo, no nos dará error, porque JS corre de forma "pasiva". Ahora, si al comienzo del archivo JS usasemos la sentencia "use strict" (Uso Estricto); esta no dejará pasar la accion de insertar una imagen cuando el objeto esta congelado y SI lo mostraá como un error de compilacion en la consola del navegador.

  Por ultimo, para que desaparezca el error, teniendo modo estricto podemos dar aviso a JS de ello especificando el objeto al que hacer referencia, como dando aviso de ello. Se realiza mediante: console.log(Object.isFrozen(producto));
*/

Object.seal(producto);       // .freeze .seal

/* Existe tambien Object.seal; donde es parecido a .freeze pero SI permite modificar los valores de sus atributos en un objeto. */

producto.precio = 'NUEVO PRECIO'; 

delete producto.precio;

console.log(producto);