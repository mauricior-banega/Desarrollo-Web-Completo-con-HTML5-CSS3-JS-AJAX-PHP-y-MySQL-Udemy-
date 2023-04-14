/* En este JS crearemos el scroll. Antes de hacia mediante el ID que sentenciabamos en el href y que escuchaba el id del elemento con el mismo nombre y scrolleaba. Ahora lo haremos usando Javascript. 
    Crearemos tambien la funcion que permite que la barra de navegacion (que no es la barra de desplazamiento) quede fijada arriba.
*/

document.addEventListener('DOMContentLoaded', function()
{
   scrollNav();

   navegacionFija();

});


function navegacionFija()
{
    const barra = document.querySelector('header');

    //Registrar el Intersection Observer
    const observer = new IntersectionObserver( function(entries){
        if(entries[0].isIntersecting)
        {
            barra.classList.remove('fijo');
        } else
            {
                barra.classList.add('fijo');
            }
    });

    //Elemento a observar
    observer.observe(document.querySelector('.sobre-festival'));

    //ACLARACION: Al efecto lo creamos mediante la fijacion de esa barra en el css 'header.scss
}



function scrollNav()
{   
    /* En toda esta parte codificamos para extraer de los elementos HTML hasta llegar al ID en el que iterará cada vez y asi realizar el desplazamiento. */

    const enlaces = document.querySelectorAll('.navegacion-principal a');

    enlaces.forEach( function(enlace)
    {
        enlace.addEventListener('click', function(e)
        {
            e.preventDefault();
            const seccion = document.querySelector(e.target.attributes.href.value);

            /* En esta seccion creamos el scroll. Hacemos que tenga el efecto de desplazamiento pasando 'smooth'. */
            seccion.scrollIntoView({
                behavior: 'smooth',
            });
        });
    });
}