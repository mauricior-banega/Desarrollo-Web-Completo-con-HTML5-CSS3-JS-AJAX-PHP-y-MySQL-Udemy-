// String o Cadenas de Texto

const tweet = 'Aprendiendo JavaScript con el curso de Desarrollo Web Completo';
const producto2 = 'Monitor HD"';
const nombre = 'Juan Pablo';
const email = 'correo@correo.com';

// length es para la extension
console.log(tweet.length);
console.log(producto2);

// IndexOf (retorna posición)

//Buscará dentro de la cadena de texto "tweet" en este caso la palabra "Javascript". Y retornará la posicion dentro de esa cadena de la J que es desde donde empieza la palabra.
console.log(tweet.indexOf('JavaScript'));

//Resultará como indice -1, y es porque no encontro esa palabra. Cuando encuentra da valores desde 0 en adelante y negativos cuando no.
console.log(producto2.indexOf('Tablet')); 


console.log(email.indexOf('@'));



// Includes (retorna true o false)

//Buscará dentro de la cadena de texto "tweet" en este caso la palabra "Javascript". Y retornará "true" en este caso. Cuando no lo encuentra da "false" como en el sgte ejemplo.
console.log(tweet.includes('JavaScript'));
console.log(producto2.includes('Tablet'));