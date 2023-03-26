// Objetos
const producto = {
    nombreProducto : "Monitor 20 Pulgadas",
    precio: 300,
    disponible: true
}


// console.log(producto.precio);
// console.log(producto.nombreProducto);
// console.log(producto.disponible);

/* Esta sintaxis es igual que la del ejemplo nº1 que obtiene el precio del producto. Podemos ver ambas expresiones codificadas dependiendo del programador, pero ambas son correctas. */
// console.log(producto["precio"]);

// Agregar nuevas propiedades
producto.imagen = 'imagen.jpg'; 

// Eliminar propiedades
delete producto.disponible;
console.log(producto);