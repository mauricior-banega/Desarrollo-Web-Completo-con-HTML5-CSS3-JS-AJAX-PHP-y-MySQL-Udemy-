// POO 

/** Object Literal: Se usa pero poco este formato de objeto, ya que es estatico/duro. Todos los valores se los asignamos previamente para poder crearlo. */

const producto = {
    nombre: 'Tablet',
    precio: 500
}

// Object Constructor: Esta es una funcion de una clase, donde una clase a su vez es tratada como un objeto en JS. Puede tener en los (),"parametros" y desde el llamado a la funsion "argumentos". Se usa mas porque es mas dinamica que la anterior. Cabe aclarar que dentro de este tipo de F() deberemos de indicar las variables que precisemos mediante ".this".

function Cliente(nombre, apellido) {
    this.nombre = nombre;
    this.apellido = apellido;
}

/* 
Funcion prototype: 
-Sirve para eliminar la creacion de funciones en exceso, porque estas se asocian a un tipo de objeto en especifico unicamente y solo puede ser usada en sobre el y no en otros objetos. De esa manera vamos a tener un codigo mas organizado ya que aprecerá el nombre del objeto explicito en la F().

*/
//F() prototype para "Cliente".
Cliente.prototype.formatearCliente = function() {
    return `El Cliente ${this.nombre} ${this.apellido}`;
}


function Producto(nombre, precio) {
    this.nombre = nombre;
    this.precio = precio;
}


// Crear funciones que solo se utilizan en un objeto en especifico.

//F() prototype para "Producto".
Producto.prototype.formatearProducto = function() {
    return `El Producto ${this.nombre} tiene un precio de: $ ${this.precio}`;
}

const producto2 = new Producto('Monitor Curvo de 49"', 800);
const producto3 = new Producto('Laptop', 300);
const cliente = new Cliente('Juan', 'De la torre');


console.log(producto2);
console.log(producto2.formatearProducto() );
console.log(producto3.formatearProducto() );