/* 

JavaScript en el Navegador y DOM Scripting

- Seleccionar contenido: Las mas conocidas que epxplicaremos a continuacion son: querySelector|querySelectorAll|getElementById.


*/

/* -------------------------------------------------------------------

    querySelector 
- Retornará uno o ningun elemento (0 o 1), que concuerde con el selector que estes escribiendo.
- Al igual que en CSS, si queremos seleccionar una clase es mediante un punto (.), y si es id el signo (#).

*/

    //    const heading = document.querySelector('h2');

    //    console.log(heading);

//Para ser mas exacto ya que podremos tener muchos h2 en nuestro documento podemos especificar tambien el id (#heading) o la clase (.header__texto).
//Se recomienda el uso de selectores id antes que de las clases pero no influye en el funcionamiento.

    //  const heading = document.querySelector('.header__texto h2');
    //  console.log(heading);

//Pero solamente haciendo esto mostraremos el elemento y nada mas, Para hacer mas interesante la herramienta, realizaremos un cambio del texto usando una de las propiedades del h2 "textContent".
//Estas propiedades de los elementos podremos verlo si desplegamos en el triangulo del elemento h2 desde el Inspeccionador en Firefox Developer.
//Basicamente desde JS usando estos selectores podremos cambiar/editar todos los elementos del DOM.

const heading = document.querySelector('.header__texto h2');

heading.textContent = 'Nuevo Heading';

//Otra modificacion comun es agregar una clase

heading.classList.add('nueva-clase');



/* -------------------------------------------------------------------

querySelectorAll 
- Retornará todos los elementos que concuerden con el selector definido, a diferencia del querySelector que retorna uno o ninguno.



*/

const enlaces = document.querySelectorAll('.navegacion a');

//console.log(enlaces);

//Nos mostrará "NodeList(6)" que son todos los elementos que tiene. Entonces para acceder auno de ellos definimos al igual que como hacemos con los arreglos, especificando entre [] la posicion.

//console.log(enlaces[0]);

//Aplicando las mismas modificaciones en propiedades:

enlaces[0].textContent = 'Nuevo texto para enlace';

//Cambiaremos en enlace[0] justamente el enlace que antes direccionaba "nosotros.html".

enlaces[0].href = 'http://google.com';

//Agregaremos una clase

enlaces[0].classList.add('nueva-clase'); //No ponemos punto para indicar que agregaremos una clase ya que se lo indicamos porque pasamos que la accion y en ella trata de una clase. 

//Eliminamos una clase

enlaces[0].classList.remove('navegacion__enlace');





/* -------------------------------------------------------------------

getElementById
-Este selector no se utiliza, se usan mas los primeros 2. Pero explicaremos este.

*/

const heading2 = document.getElementById('heading'); 
//Como ya sabe que estas buscando un ID no hace falta especificar el #.

console.log(heading2);

//Veremos como selecciona el h2 porque es el unico elemento que tiene por ID "heading". No ejemplificaremos modificaciones pero claro que pueden aplicarse con este selector tambien.

/* -------------------------------------------------------------------

Crear HTML con createElement

Generar un nuevo enlace: 

- Se pasa .createElement y dentro de los () la etiqueta en Mayusculas.

*/

const nuevoEnlace = document.createElement('A');

// console.log(nuevoEnlace);


//Veremos que agrega una etiqueta vacia "a", pero un enlace tiene mas elementos. Agregaremos cada uno de ellos (href/texto/clase). Por ultimo lo agregamos al documento.
//Todo esto nos sirve para darle dinamismo al codigo ya que es mas facil acceder mediante JS para modificar/agregar o eliminar que modificar directamente un HTML o documento quizas formulario, traido desde una DBO.

//Agregamos href
nuevoEnlace.href = 'nuevo-enlace.html';

//Agregamos texto
nuevoEnlace.textContent = 'Un nuevo enlace';

//Agregamos la clase
nuevoEnlace.classList.add('navegacion__enlace');

//Agregarlo al documento
const navegacion = document.querySelector('.navegacion');
navegacion.appendChild(nuevoEnlace);


console.log(nuevoEnlace);



/* -------------------------------------------------------------------

Eventos
- Veremos varios eventos asociados al window/documento entre otros del cual mostraremos en consola. Podremos ver como mandamos varios mensajes por consola pero el 2º/3º y al ultimo 5º pero este se muestra antes que los otros mencionados y esto es porque espera la carga de los eventos lanzados, distintos en sintaxis cada uno pero que tienen la misma funcionalidad. Este evento se ejecuta cuando se carga todos los archivos.

*/

console.log(1); //Mensaje 1º


window.addEventListener('load', function() //(1)
{
    console.log(2); //Mensaje 2º

    //"load", espera a que el JS y los archivos que dependen del HTML (img/videos, etc) esten listos.
});


//Otra forma de expresar la carga con diferente sintaxis

window.onload = function()
{
    console.log(3); //Mensaje 3º
}


document.addEventListener('DOMContentLoaded', function(){
    console.log(4); //Mensaje 4º

    //Solo espera por la carga del HTML, pero no por CSS o imágenes. Por eso es mas rápido, y en este caso que usaremos scripting y trabajaremos sobre HTML y no otros archivos con JS utilizaremos en caso de necesitar, este evento.
});


console.log(5); //Mensaje 5º

/*(1)-En el Mensaje 2º , si quitamos la funcion tipo CallBack que esta y la expresamos por separado, podremos solo poner el nombre de la F() unicamente sin los paréntesis. Ejemplifico:


window.addEventListener('load', imprimir)

    function imprimir()
        {
            console.log(2);
        } 

-Aclaramos esto porque sirve hacer esto si la funcion en tiene muchas lineas de codigo es mejor separarlo y no declararlo en la misma sentencia del evento.

*/


//Hay otro evento "onscroll" que sirve para contabilizar cuantas veces se scrollea en la página, y mostraremos las veces por consola

window.onscroll = function()
{
console.log('scrolling...');
}




/* -------------------------------------------------------------------

Seleccionar elementos y asociarles un evento

-Veremos como seleccionar un boton, pasarle el evento "click" y ejecutar una funcion que muestre en consola la accion.- Sucede que cuando ejecutamos ese mensaje sucede muy rapido y no llegamos a leer y es porque el boton esta dentro de un formulario y al dar click y "enviarse" lo que normalmente sucede cuando llenamos uno con datos de la persona, se envia rapido y durante un segundo veremos el efecto de la consola indicando 'Enviando formulario' que es el tiempo que dura.
-Para que podamos ver el efecto, pasamos una variable en la funcion, de la que usaremos para varias cosas, llamada de varias formas (e/event/evento, etc), ese evento puede usarse siempre que usemos metodos "addEventListener". Con esa variable podremos detener el envio de ese formulario pudiendov er el mensaje que entregara la consola; pero ademas lo usaremos para ver toda la informacion que ese evento trae consigo como las coordenadas x e y donde se clickeo, nombre del boton etc. Eso lo vemos desplegando el triagulo en el inspector sobre el evento "Mouse Event".
*/

const btnEnviar = document.querySelector('.boton--primario');

/* btnEnviar.addEventListener('click', function(evento)
{
    console.log(evento);
    evento.preventDefault(); 

    console.log('Enviando formulario');
}); */



/* -------------------------------------------------------------------

Evento de los Inputs y Textarea

-Veremos como ejecutar la funcion de mostrar por consola cuando se esta "escribiendo" dentro de un input/textarea. Podemos usar 'change' que se ejecutara cuando "hallamos terminado de escribir" y toquemos por fuera del input o textarea. Pero si queremos que ejecute cada vez que se introduce una letra usamos 'input' que será mas eficiente.

-Como en el evento anterior, si pasamos e en la funcion y lo cargamos en un consol para mostrarlo, veremos todos los elementos de el por consola. Explica como ver lo que el cliente escribe, se accede mediante e.target.VALUE (para extraer el valor de ese campo).
-Luego para poder hacer los mismo con los imputs de email y mensaje haremos lo mismo con el ID correspondiente de cada uno, para reutilizar codigo crearemos en vez de la variable "e", una llamada "leerTexto" que realiza la operacion de enviar por consola y que compartan todos. Pero supongamos que queramos ver los valores que contiene el evento, esa "e" si la podemos definir dentro de la funcion de leerTexto, como sabemos siempre que usemos addEventListener podremos definir una variable para extraer los datos.

-Por ultimo, creamos un objeto llamado datos que alojará los valores (nombre/email/mensaje) se carguen en cada input. Esto es muy util para utilizar formularios. Para que funcione los valores/llaves del objeto deben tener el mismo nombre que los ID de los inputs.

Evento de Submit

-En un formulario hay que usar "submit" porque usamos la clase .formulario para poder ejecutar el evento. A diferencia del anterior que usabamos una clase de un boton, al que escuchamos mediante el evento "click", pero que es de tipo "submit" tambien pero es un elemento distinto pero al que podemos pasar un click hasta a un texto. Pero no asi a un formulario.

Para interpretar mejor y adminsitrar las sentencias ubicaremos los las lineas de esta explicacion en conjunto con las del evento "Inputs y Textarea".


*/

// Eventos con Click y submit...

// const btnEnviar = document.querySelector('.formulario input[type=submit]');
// console.log(btnEnviar);

// btnEnviar.addEventListener('click', function() { // callback o closure 
//     console.log('click');
// });

const datos = {
    nombre: '',
    email: '',
    mensaje: ''
}

// submit
const formulario = document.querySelector('.formulario');

formulario.addEventListener('submit', function(e) {
    e.preventDefault();

    console.log(e);

    console.log('Di click y la página ya no recarga');

    console.log(datos);

    // Validar el Formulario...

    const { nombre, email, mensaje } = datos;

    if(nombre === '' || email === '' || mensaje === '' ) {
        console.log('Al menos un campo esta vacio');
        mostrarAlerta('Todos los campos son obligatorios', true);//Pasamos 2º argumento "true" para la funcion mostrarAlerta
        return; // Detiene la ejecución de esta función
    }

    console.log('Todo bien...')

    mostrarAlerta('Mensaje enviado correctamente');
    /* Para esta no pasamos 2º argumento ya que sino esta definido (como para el otro es si y es true) entonces tomará el valor del paramentro definido como error=null (valor por default asignado) que estará en la funcion mostrarAlerta. */
});

//Crearemos una sola funcion que mostrará los mensajes (Refactoring de Código). Eliminaremos las lineas repetidas y en donde sea distinto aplicaremos metodos para que opte dinamicamente. Aplicaremos refactoring para mostrarError & mostrarMensaje creando una llamada mostrarAlerta.

function mostrarAlerta(mensaje, error = null) {
    const alerta = document.createElement('p');
    alerta.textContent = mensaje;

//Pero las clases que definen son distintas entonces creamos un if para que elija un camiono u otro, ademas de pasar el valor true como paramentro de error.

    if(error)
    {alerta.classList.add('error');}
    else
    {alerta.classList.add('correcto');}

    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}



/* function mostrarError(mensaje) {
    const alerta = document.createElement('p');
    alerta.textContent = mensaje;
    alerta.classList.add('error');

    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}

function mostrarMensaje(mensaje) {
    const alerta = document.createElement('p');
    alerta.textContent = mensaje;
    alerta.classList.add('correcto');
    formulario.appendChild(alerta);

    setTimeout(() => {
        alerta.remove();
    }, 3000);
}
 */

// Eventos de los Inputs...
const nombre = document.querySelector('#nombre');
const email = document.querySelector('#email');
const mensaje = document.querySelector('#mensaje');


nombre.addEventListener('input', leerTexto);
email.addEventListener('input', leerTexto);
mensaje.addEventListener('input', leerTexto);

function leerTexto(e) {
    // console.log(e);
    // console.log(e.target.value);

    datos[e.target.id] = e.target.value;

    console.log(datos);
}








