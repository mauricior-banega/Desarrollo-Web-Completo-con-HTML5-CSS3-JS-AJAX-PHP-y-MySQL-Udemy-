/* Promises en JavaScript */

const usuarioAutenticado = new Promise( (resolve, reject) => {
    const auth = true;

    if(auth) {
        resolve('Usuario Autenticado'); // EL PROMISE SE CUMPLE
    } else {
        reject('No se pudo iniciar sesión'); // el promise no se cumple
    }
});

/* Accedemos a los valores resultantes de la promesa:
1- .then: Muestra si se ejecuto resolve, (mediante lo que contenga dentro), osea si paso la promesa. Eso que contiene se guarda en el parámetro que contiene "resultado", que se usará para ser mostrado por consola. Es decir 'Usuario Autenticado' se guardará en resultado.

2-.catch: Muestra si se ejecuto reject (mediante lo que contenga dentro), osea si no paso la promesa. Eso que contiene se guarda en el parámetro que contiene "error", que se usará para ser mostrado por consola. Es decir 'No se pudo iniciar sesión' se guardará en error.

Cabe aclarar que si usamos ej un: 

    console.log(usuarioAutenticado); 

Mostrará unicamente el estado en el que se encuentra esa promosa y puede tener 3 instancias que explicaremos:
-Pending : No se ha cumplido pero tampoco se ha rechazado
-Fulfilled : Ya se cumplio
-Rejected : Se ha rechazado o no se pudo cumplir
*/

usuarioAutenticado
    .then( resultado => console.log(resultado)) 
    .catch( error => console.log(error))

