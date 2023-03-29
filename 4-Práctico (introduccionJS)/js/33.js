/* Fetch API 

- Que es?: Al igual que Ajax te permite enviar u obtener informacion de un servidor. Puedes obtener un archivo local o una respuesta de un servidor (en formato texto o JSON) ya que JS por si solo no puede consultar una DBO sin ayuda de los antes mencionados.
En JS se pueden procesar practicamente todas las API`s Modernas y se utiliza Promises o async/await. 

*/

/* Aclaraciones:
1-Cuando realizamos un fetch al archivo que contiene en si el JSON, donde se mostrará en consola en este ejemplo, podemos ver que aparecera "Response" y dentro varios campos. Veremos que uno de esos campos dice status; si aparece 200 es que realizo la conexion correctamente, pero si aparece 404 es que no. Tambien en statusText aparecerá "Not Found" (sino lo encuentra) o "Ok" si es que si.
2- En el punto 2 si es correcta la conexion mostraremos lo que contiene "resultado" que será el arreglo del objeto empleados que traemos desde JSON interpretado correctamente y tratado como objeto por JS. Pero si pusieramos resultado.text() veriamos en consola lo codificado asi tal cual en el JSON y no presentado como un arreglo.
3- Para que todo lo anterior pueda verse deberemos de crear el otro .then para obtener los datos cargados en ese arreglo y mostrarlo en consola como dijimos con formato json o texto. Podemos tambien aplicar destructuring (veasé práctico nº 11), para simplificar codigo.
4- Dejando claro como se crea usando .then (de promesas), explicamos como se usa mediante async/await. Primero, declaramos/agregamos la sentencia "async" a la F() en cuestion "obtenerEmpleados".
5- 
*/

async function obtenerEmpleados() {

    const archivo = 'empleados.json'; //Guardamos la conexion en una variable para trabajar mejor.

    //Realizamos un fetch al archivo: usaremos acá promesa y comentamos para explicar como es con el otro metodo.

    /*
    fetch(archivo) 
        .then( resultado => resultado.json())  //(2)
        .then( datos => {
           // console.log(datos.empleados); //(3)

            //Destructuring: Extraemos el valor y creamos la variable en el mismo paso.

            const { empleados } = datos; 
            console.log(empleados);

        });
    */

    //Realizamos un fetch al archivo: usaremos acá async/awaint
    
    //Paso 1
    const resultado = await fetch(archivo);

    //Ej: Si hicieramos un console a resuldado mostraria lo explicado en "Aclaraciones" punto 1.

    //Paso 2
    const datos = await resultado.json(); 
    //No usamos Promise.all() porque esta linea si depende que esté procesado/finalizado "resultado", osea la conexion para mostrar los datos que contiene. Es decir no podrian ejecutarse al mismo tiempo como es el efecto que se logra usando Promise.all(); ver práctico anterior nº 32.

    //Paso 3
    console.log(datos); //Por ultimo mostramos
}

obtenerEmpleados();