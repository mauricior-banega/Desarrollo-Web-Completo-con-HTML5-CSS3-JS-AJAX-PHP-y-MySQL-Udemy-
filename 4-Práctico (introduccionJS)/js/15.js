// Array Methods (Continuamos viendo mas métodos para aplicar a los arreglos).

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo'];

const carrito = [
    { nombre: 'Monitor 20 Pulgadas', precio: 500 }, //Objeto 1
    { nombre: 'Televisión 50 Pulgadas', precio: 700 }, //Objeto 2
    { nombre: 'Tablet', precio: 300 }, //Objeto 3, etc.
    { nombre: 'Audifonos', precio: 200 },
    { nombre: 'Teclado', precio: 50 },
    { nombre: 'Celular', precio: 500},
    { nombre: 'Bocinas', precio: 300},
    { nombre: 'Laptop', precio: 800}
];

// forEach
        meses.forEach(function(mes) {
            if(mes == 'Marzo') {
                console.log('Marzo si existe');
            }
        });


// Includes: Es un equivalente al forEach porque buscará el mes 'Diciembre', si lo encuentra muestra en consola "true". Pero puede usarse para elementos que NO sean objetos ya que si lo aplicamos a un objeto dará como resultado siempre un "false". Ejemplificamos ambos:

//Ahora para que funcione en objetos usamos ".some".

        let resultado = meses.includes('Diciembre'); //Da falso y es correcto
        /* console.log(resultado); */

        let resultado2 = carrito.includes('Tablet'); //Dará falso siempre y es incorrecto, porque no se puede usar includes en objetos.
        /* console.log(resultado); */


// Some ideal para arreglo de objetos
        resultado = carrito.some(function(producto) {
            return producto.nombre === 'Celular' //Dará resultado true, y es correcto.
        })

    /* Aclaracion: Podemos codificar toda esta parte de la F() de forma simplificada usando Arrow Function (funcion tipo flecha). Ejemplificamos, quedaria:
        
                    resultado = carrito.some(producto=>producto.nombre === 'Celular'); //Dará resultado true, y es correcto.
        })
    */



// Reduce: Método que itera todos los elementos del arreglo sumandolos, debe pasarse la inicializacion tambien que será 0 en este caso.
        resultado = carrito.reduce(function(total, producto) {
            return total + producto.precio
        }, 0);
/* 
Arrow Function: resultado = carrito.reduce((total, producto) => total + producto.precio ,0);  
*/



// Filter: Sirve para obtener todos los elementos, o algunos, o uno en particular, basicamente es un filtro como el nombre lo indica. Aplicando los operadores para realizarlo ==/!==/>/<.

        resultado = carrito.filter(function(producto) {
            return producto.precio > 400 //Traerá todos los elementos mayores en precio que $400.
        });

        resultado = carrito.filter(function(producto) {
            return producto.nombre !== 'Celular' //Traerá todos los elementos que no sean del tipo 'Celular'.
        });



        console.log(resultado);
