
/* Try Catch:

-Es un detector de errores, podemos usarlo para que muestre en consola el error pero tambien evita que se detenga (por ese error generado) la ejecucion de las siguientes lineas o ejecuciones que sigan adelante apartir de ese error, ya que como sabemos en JS si aparece un error como en este caso "linea 14", de alli en adelante no funcionará. Mostrando en este caso solo el nº 20.

*/

const numero1 = 20;
const numero3 = 30;


console.log(numero1);
//console.log(numero2); ESTO LANZARÁ EL ERROR EN JS

try {
    console.log(numero2);
} catch (error) {
    console.log(error);
}

console.log(numero3);