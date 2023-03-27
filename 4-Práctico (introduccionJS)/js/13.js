/* Unir dos objetos con el Spread Operator */

const producto = {
    nombreProducto : "Monitor 20 Pulgadas",
    precio: 300,
    disponible: true
}

const medidas = {
    peso: '1kg',
    medida: '1m'
}

const nuevoProducto = { ...producto, ...medidas }; //Spread Operator

console.log(producto);
console.log(nuevoProducto);

/* De esta manera "nuevoProducto" mostrará los atributos de ambos objetos ya que fueron unidos. */