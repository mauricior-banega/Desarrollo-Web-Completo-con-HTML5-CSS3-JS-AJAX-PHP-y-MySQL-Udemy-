// Async / await

/*
Explicacion (F() descargarNuevosClientes/app): 

1-Creamos una funcion "descargarNuevosClientes" que creará un objeto tipo Promesa. Para este ejemplo crearemos unicamente si se ejecuta correctamente (resolve). Entonces ejecuta un mensaje en consola 'Descargando clientes... espere...'
2- Luego se ejecuta el setTimeout que contiene el "resolve" pero con 5s despues (simulando la demora en descargar clientes).
3-Luego de esperar ese tiempo se mostrará el mensaje 'Los Clientes fueron Descargados'. Pero sucede que tambien fue creada la funcion "app" que se ejecutará de manera asincrona, pero para que sirve? Para que si sucede que hay demora o no se ejecuta la funcion anterior de descarga de clientes, funcione de todas formas "app". Esta tendrá que especificarse mediante "async", ademas de validar mediante un try/catch si se descargaron los clientes o no, y si es que no capture el error.
4- Deberemos pasar en try algo asi como un .then para indicar que hacer si sucede la descarga, pero en funciones async eso no existe, asique en remplazo usaremos el llamado a la funcion de descarga y le pasamos "await" para que espere (siempre que usemos async usaremos await), entonces, guardamos ese llamado a la funcion en una variable, que mostraremos luego en consola, con el mensaje resultando una vez procesado el resolve. Todo estos procesos se llevarán a cabo cuando se llame la funcion "app" que a su vez ejecuta "descargarNuevosClientes".
5- Veremos realmente esto de que pueda ejecutarse otra funcion o codigo JS de manera asincrona cuando luego de todo explicado, debajo del llamado, app(); hacemos alguna accion por ejemplo mostrar algo por consola, se ejecute con la demora que tenga el procesa inicial, pero de forma inmediata se mostrara el mensaje por consola escrito posteriormente.
6 - Esto se crea pensando en un caso practico, aplicandolo por ejemplo a que usaremos funciones en nuestro JS que no precisen que se procese una API especifica para funcionar y que lo hagan independientemente de ello, pero si hay otras que si entonces podremos introducir esa funcion dentro del "try" para que una vez traida esa API ejecute las que si dependan. De igual caso de aplica cuando se esperan datos de una DBO para hacer algunas acciones en especifico, de clientes por ejemplo.
 

Explicacion (F() descargarUltimosPedidos/app):

7- Ahora añadiremos otra funcion que indicará los ultimos pedidos y que tambien se procese luego de 3s en este caso. Como vemos comentado y en ejemplo, muchos comenten el error de codificar como aparece alli, ejecutandose un proceso y una vez finalizado, el otro. Pero esto causa una demora en exceso por uno espera del otro y nose ejecutan al mismo tiempo.
 - Entonces para que no suceda, creamos una variable "resultado" que alojará ejecucion de todas las promesas existentes en el archivo (ver la sentencia). Podremos ver que se codifica await Promise.all([...]). Esos corchetes crean un arreglo (como sabemos), y dentro pasaremos cuales son las F() a ejecutar simultaneamente. Entonces para verlo en consola podemos llamar la variable (ahora arreglo) resultado o pasar sino su indice/posocion del arreglo y verlos asi a cada uno.

Aclaciones varias:
1- setTimeout: Ejecuta una funcion pero luego de esperar los milisegundos indicados. Como vemos en el práctico muestra luego de 5 segundos "Los Clientes fueron Descargados".
    setInterval: No esta en el práctico pero si nos basamos en el mismo ejemplo, ejecuta en intervalos, especificando en miliseg tambien una funcion. Por ejemplo si mostrase por consola "Ejemplo..." y pusieramos 3000 ms, mostraria cada 3 segundos por consola el mensaje indicado.

*/

function descargarNuevosClientes() {
    return new Promise( resolve => {
        console.log('Descargando clientes... espere...');

        setTimeout( () => { /* /(1) */
            resolve('Los Clientes fueron Descargados');
        }, 5000 );
    });
}

function descargarUltimosPedidos() {
    return new Promise( resolve => {
        console.log('Descargando pedidos... espere...');

        setTimeout( () => {
            resolve('Los Pedidos fueron Descargados');
        }, 3000 );
    });
}

async function app() {
   try {
       /* (7) */
    //    const clientes = await descargarNuevosClientes();
    //    const pedidos = await descargarUltimosPedidos();
    //    console.log(clientes);
    //    console.log(pedidos);

    const resultado = await Promise.all([ descargarNuevosClientes(), descargarUltimosPedidos() ]);
    console.log(resultado[0]);
    console.log(resultado[1]);
   } catch (error) {
       console.log(error);
   }

  
}

app(); /* 4 */



