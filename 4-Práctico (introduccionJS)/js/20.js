/* Métodos de propiedad */

//Es una sintaxis muy usada, que nos permite estructurar un pyoyecto de forma ordenada.


//Métodos de propiedad: Tienen la sintaxis de un metodo pero en realidad son funciones. La estructura es el nombre del metodo propiedad + : + F().

//Se pueden definir dentro de la sentencia el objeto o por fuera; ejemplo (1).

const reproductor = {
    reproducir : function(id) {
        console.log(`Reproduciendo Canción con el ID: ${id}`)
    },
    pausar: function() {
        console.log('Pausando...')
    },
    crearPlaylist: function(nombre) {
        console.log(`Creando la playlist: ${nombre}`)
    },
    reproducirPlaylist: function(nombre) {
        console.log(`Reproduciendo la playlist: ${nombre}`)
    },
}

/* Ejemplo (1): Sentencia que agrega propiedad pero por fuera del objeto. */

reproductor.borrarCancion = function(id) {
    console.log(`Eliminando la canción: ${id}`)
}

reproductor.reproducir(3840);
reproductor.pausar();
reproductor.borrarCancion(20);
reproductor.crearPlaylist('Heavy Metal');
reproductor.reproducirPlaylist('Heavy Metal');