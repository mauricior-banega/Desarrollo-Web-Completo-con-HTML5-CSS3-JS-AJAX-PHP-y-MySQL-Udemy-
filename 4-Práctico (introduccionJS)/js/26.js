/* This en JS
-Se usa para hacer referencia al objeto en el que se esta utilizando y no haga falta tener que poner en cada caso el nombre del objeto para acceder al elemento; ejemplo: 
    El Cliente ${reservacion.nombre} reservó y su cantidad a pagar es de ${reservacion.total}
*/


const reservacion = {
    nombre: 'Juan',
    apellido: 'De la torre',
    total: 5000,
    pagado: false,

    /* informacion:() => {console.log(`El Cliente ${reservacion.nombre} reservó y su cantidad a pagar es de ${reservacion.total}`); */

        informacion: function() {
        console.log(`El Cliente ${this.nombre} reservó y su cantidad a pagar es de ${this.total}`); 
    }
}

const reservacion2 = {
    nombre: 'Pedro',
    apellido: 'De la torre',
    total: 5000,
    pagado: false,
    informacion: function() {
        console.log(`El Cliente ${this.nombre} reservó y su cantidad a pagar es de ${this.total}`);
    }
}

reservacion.informacion();
reservacion2.informacion();

/* Aclaracion (pregunta de trabajo):
-Podemos transformar la F() del objeto a una del tipo flecha? Si, pero no la creada porque esta definido el metodo .this para apuntar a sus variables.

        informacion:()=> {this.xxxx} //no funcionará, pero...

        informacion:()=> {objeto.xxxx} //funcionará

- Cuando se da que la F() flecha no funciona es porque ese tipo de funcion hace referencia al ambito/ventana global (windows) ya que tiene contenido {this.xxxx} en su declaracion.
- Ahora, si usamos una funcion (no flecha) con su declaracion "function()", hace referencia al objeto y tambien funcionará en ese caso.

        informacion: function() {this.xxxxx} //funcionará
*/