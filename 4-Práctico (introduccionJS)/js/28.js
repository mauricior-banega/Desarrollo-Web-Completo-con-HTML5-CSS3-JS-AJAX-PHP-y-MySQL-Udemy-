// Classes

/* (1) - En una clase vemos que no lleva () para pasar paramentros, se utiliza en vez de eso lo que se llama un "constructor".
*/
class Producto { //(1)
    constructor(nombre, precio) {
        this.nombre = nombre;
        this.precio = precio;
    }

    formatearProducto() { /* No es una funcion, mas bien un Método de la clase. */
        return `El Producto ${this.nombre} tiene un precio de: $ ${this.precio}`;
    }

    mostrarPrecio() //Método de tarea practica
    {
        return `El precio del producto es: $${this.precio}`;
    }
}

const producto2 = new Producto('Monitor Curvo de 49"', 800);
const producto3 = new Producto('Laptop', 300);
const producto4 = new Producto('PC Gamer',1200);




// Herencia

/* -Podemos crear otra clase que herede osea sea hija de una clase padre. Crearemos otra llamada "Libro" que será hija de "Producto".
  -Esta clase se define mediante "extends" + clase padre. Dentro de ella debemos definir los paramentros del contructor padre dentro de los paréntesis y dentro de la declaracion "super". Luego los atributos que no se repitan o sean solo de la clase libro, ej: isbn.
  -De esta manera podemos acceder a los metodos de la clase padre desde la clase hija.
*/

class Libro extends Producto {
    constructor(nombre, precio, isbn) {
        super(nombre, precio);
        this.isbn = isbn;
    }

    formatearProducto() {
        return `${super.formatearProducto() } y su ISBN es ${this.isbn}`;
    }
}

/* Podemos observar algo importante, en la clase hija Libro, creamos un metodo llamado igual al que tiene el padre y funciona, pero muestran distintos mensajes. Para poder especificar mediante el llamado a la clase, donde estamos haciendolo mendainte los console.log pasamos el nombre del objeto creado y el metodo.
 Dependiendo sea un objeto o el otro será el metodo que ejecute/muestre. Si ejecutamos: 

 console.log(producto2.formatearProducto()); 
 
 mostrará:

 El Producto Monitor Curvo de 49 tiene un precio de: $800;

Ahora en cambio si ejecutamos:

console.log(libro.formatearProducto());

mostrará:

El Producto Monitor Curvo de 49 tiene un precio de: $800 y su ISBN es 910313981389139

-Podremos ver que para usar si queremos un método del padre desde clase hija tenemos que especificar el metodo del padre con la palabra super concatenada, como asi fuera una variable. Ej:

return `${super.formatearProducto() } y su ISBN es ${this.isbn}`;

*/

const libro = new Libro('JavaScript la Revolución', 120, '910313981389139');

console.log(libro.formatearProducto() );
console.log(producto2.formatearProducto());

console.log(producto4.mostrarPrecio());
