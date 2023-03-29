/* Notification API */

/* Pasos de ejemplo para validar una API (que envie una bnotificacion al navegador. Deberemos de dar permiso o no desde la ventana.)

1- Para validar una API, creamos un selector que trabajará en el documento, seleccionando el id que le proporcionemos. A su vez guardaremos ese valor en la variable "boton" para poder trabajar mas comodos.

2- Luego llamamos al evento 'click' mediante la funcion  addEventListener. Y en formato flecha que es mas corto pasaremos otra funcion llamada Notification que es una promesa en si misma. Declaramos Notification.requestPermission() y pasaremos el .then unicamente, que mostrará por consola si tuvo permiso o no.

3- Despues si se tiene acceso creamos un if que preguntará si es correcto y realizará "algo" en ese caso. Lo que hará es crear un objeto Notification y pasará 2 elementos, el 1º es el titulo de la notificacion entre '', y 2º un "icon", propiedad propia del objeto; en el se define la imagen/logo para mostrar dentro y un mensaje dentro tambien y se define en "body".

*/

const boton = document.querySelector('#boton');

boton.addEventListener('click', () => {
    Notification.requestPermission()
        .then(resultado => console.log(`El resultado es ${resultado}`) )
})



if(Notification.permission == 'granted') {
    new Notification('Esta es una notificación', {
        icon: 'img/ccj.png',
        body: 'Código con Juan, los mejores tutoriales'
    })
}