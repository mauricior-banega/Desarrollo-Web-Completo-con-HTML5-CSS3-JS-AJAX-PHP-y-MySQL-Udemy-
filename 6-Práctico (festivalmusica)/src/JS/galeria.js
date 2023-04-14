/* Forma dinámica de crear varios "li de una ul", sin codificarlo desde el HTML. En este practico eran 12 fotos de la galeria, pero supongamos que son 300 o mas, tendremos que generar un codigo de estas caracteristicas para hacerlo dinamico y reutilizable, crearemos selectores para los cuales podamos insertar y extraer elementos HTML. */

document.addEventListener('DOMContentLoaded', function()
{
    crearGaleria();
});

function crearGaleria()
{
    const galeria = document.querySelector('.galeria-imagenes');

    for(let i=1; i<=12; i++)
    {   
        //Generar imagen
        const imagen = document.createElement('IMG');
        imagen.src = `build/img/thumb/${i}.webp`;

        //Crear un "indice" o indicador que ayudará a saber cual es la foto que se clickea para despues tomar ese indice y agrandarla. La creamos mediante la sentencia de la imagen + dataset.imagenId. Es una forma de crear atrubitos personalizados, esto se podrá ver en el HTML de la imagen (data-imagen-id="6")
        imagen.dataset.imagenId = i;

        //Agregar la funcion de mostrarImagen
        imagen.onclick = mostrarImagen;

        const lista = document.createElement('LI');
        lista.appendChild(imagen);

        galeria.appendChild(lista);
    }
}


function mostrarImagen(e)
{
    const id = parseInt (e.target.dataset.imagenId);

    //Generar imagen
    const imagen = document.createElement('IMG');

    imagen.src = `build/img/grande/${id}.webp`;

    //Añadimos clase que dará en CSS el efecto de escurecimiento al fondo y no a la imagen. Creamos un div que tendrá el efecto

    const overlay = document.createElement('DIV');

    overlay.appendChild(imagen); //Abrimos la imagen
    overlay.classList.add('overlay'); //Creamos lista


    //Cuando se da click (fuera de la imagen) para cerrarla
    overlay.onclick = function(){
        overlay.remove();
        body.classList.remove('fijar-body');//La cree yo
    }

    //Botón para cerrar la imagen
    const cerrarImagen = document.createElement('P');
    cerrarImagen.textContent = 'X';
    cerrarImagen.classList.add('btn-cerrar');

    //Cuando se al clickear en X se cierra la imagen
    cerrarImagen.onclick = function()
    {
        /* overlay.remove();
        //Asi eliminamos la variable creada "overlay" que crea y muestra la imagen. Al eliminarla se quita la imagen (por dentro se elimina el div creado que aloja el src de la imagen grande).
        body.classList.remove('fijar-body');//La cree yo */

        //Aclarando lo comentado arriba: Sucedia que al cerrar imagen por x o clickeando fuera lo hacia pero no hacia scroll, por ello habia que eliminar la clase agregada 'fijar-clase'. Para ello en una fde las f() aplico una sentencia y en esta no funcionaba, pero si metida dentro de un if.

        if(overlay.remove())
        {
            body.classList.remove('fijar-body');
        }
    }

    overlay.appendChild(cerrarImagen);//Cerramos la imagen

    //Mostrar en el HTML
    const body = document.querySelector('body');
    body.appendChild(overlay)

    body.classList.add('fijar-body'); //Al tocar en la imagen se crea esta nueva clase que servira para darle css al body y que no permita el scroll mientras se esta abierta una imagen. Esta clase se creará y esta definida en globales.scss
}