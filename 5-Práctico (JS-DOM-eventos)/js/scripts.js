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

XXXXX
-

*/



//Veremos 

