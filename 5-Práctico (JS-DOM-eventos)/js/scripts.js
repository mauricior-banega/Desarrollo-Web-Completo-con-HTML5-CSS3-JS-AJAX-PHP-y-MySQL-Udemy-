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

