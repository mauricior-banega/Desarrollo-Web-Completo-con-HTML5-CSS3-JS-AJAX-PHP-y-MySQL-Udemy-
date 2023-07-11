
document.addEventListener('DOMContentLoaded', function(){
    eventListeners();

    darkMode();
});


function darkMode() {

    //Explicacion en (2) de index.html
    const prefiereDarkMode = window.matchMedia('prefers-color-scheme: dark');

    /* console.log(prefiereDarkMode); */

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function(){

        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        } 
    });


    const botonDarkMode = document.querySelector('.dark-mode-boton');

    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    });
}


function eventListeners() {
    //alert('prueba');

    const mobileMenu= document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click', navegacionResponsive);
}


function navegacionResponsive() {
console.log('Desde navegacionResponsive');

const navegacion = document.querySelector('.navegacion');

//console.log(navegacion);


    /* -Podemos crear un if para ver si tiene la clase quitarla y sino agregarla. Tambien podemos hacerlo con toggle, que hace lo mismo.
    
    if(navegacion.classList.contains('mostrar'))
    {
        navegacion.classList.remove('mostrar');
    } else 
        {
            navegacion.classList.add('mostrar');
        } 
    */

    navegacion.classList.toggle('mostrar');
}
