
/* Arrow Functions */

/* Ejemplificaremos en base a la funciones con Formato de sintaxis: Expresion, ya que la del tipo declaracion no es posible aplicarle una expresion tipo flecha. Porque? Porque simplemente no tiene una variable asignada en la expresion, necesaria si en este tipo arrows.  */

/*  
const sumar2= function(n1,n2)
{
    console.log(n1 + n2);
}
*/

//Funcion pasada a tipo flecha.
const sumar2 = (n1, n2) => console.log(n1 + n2);

sumar2(5, 10);


const aprendiendo = tecnologia => console.log(`Aprendiendo ${tecnologia}`) //Sin paréntesis  cuando se tiene 1 solo paramentro en la F() y sin corchetes cuando es una sola linea de codigo.

aprendiendo('JavaScript');



// Array Methods, (pasaremos estas a tipo flecha).

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'];

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

// forEach
meses.forEach( mes => {
    if(mes == 'Marzo') {
        console.log('Marzo si existe');
    }
});

let resultado;

// Some ideal para arreglo de objetos
resultado = carrito.some( producto => producto.nombre === 'Celular');

// Reduce
resultado = carrito.reduce( (total, producto) =>  total + producto.precio, 0);

// Filter
resultado = carrito.filter( producto => producto.precio > 400);
resultado = carrito.filter( producto =>  producto.nombre !== 'Celular');

console.log(resultado);


