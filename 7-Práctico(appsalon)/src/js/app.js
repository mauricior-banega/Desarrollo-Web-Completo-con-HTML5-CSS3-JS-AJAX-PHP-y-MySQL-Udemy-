
//Variable global usada para cambiar los tabs en la navegacion.
let pagina = 1;

const cita = {
    nombre:'',
    fecha:'',
    hora:'',
    servicios:[]
}

document.addEventListener('DOMContentLoaded', function() {
    iniciarApp();
});

function iniciarApp(){

    mostrarServicios();

    //Resalta el DIV actual segun el Tab al que se presiona
    mostrarSeccion();

    //Oculta o muestra una seccion segun el Tab al que se presiona
    cambiarSeccion();

    //Paginación siguiente y anterior
    paginaSiguiente();
    paginaAnterior();

    //Comprueba la pagina actual para ocultar o mostrar la paginacion
    botonesPaginador();

    //Muestra el resumen de la cita (o mensaje de error en caso de no pasar la validación)
    mostrarResumen();

    //Almacena el nombre de la cita en el objeto
    nombreCita();

    //Almacena la fecha de la cita en el objeto
    fechaCita();

    //Deshabilitar dias pasados
    deshabilitarFechaAnterior();

    //Almacenar hora cita
    horaCita();

    
}


function mostrarSeccion()
{ 
  //Eliminar mostrar-seccion de la seccion anterior
  const seccionAnterior = document.querySelector('.mostrar-seccion');
    if(seccionAnterior) {
        seccionAnterior.classList.remove('mostrar-seccion');
    }
  

  const seccionActual = document.querySelector(`#paso-${pagina}`);
  seccionActual.classList.add('mostrar-seccion');


  //Eliminar la clase de actual en el tab anterior
  const tabAnterior = document.querySelector('.tabs .actual');
  if(tabAnterior) {
    tabAnterior.classList.remove('actual');  
  }


  //Resalta el Tab actual
  const tab = document.querySelector(`[data-paso="${pagina}"]`);
  tab.classList.add('actual');

}



function cambiarSeccion()
{
   const enlaces = document.querySelectorAll('.tabs button'); 
   enlaces.forEach( enlace =>{
        enlace.addEventListener('click', e => {
            e.preventDefault();

            //Obtenemos el data-paso del HTML en String, pero necesitamos que sea un nº (int). Hacemos la conversion.

            pagina = parseInt(e.target.dataset.paso);

            //console.log(typeof e.target.dataset.paso);
            //console.log(e.target.dataset.paso);
            //console.log('Click en un botón');
            //console.log(pagina);

            /* Eliminar mostrar-seccion de la sección anterior
            document.querySelector('.mostrar-seccion').classList.remove('mostrar-seccion'); 
            (Cortamos este codigo para usarlo en la f() mostrarSeccion).*/
            //----------------------------------------------------

            /*         
            -Todo este trozo de codigo se quita ya que la funcionalidad es reemplazada por mostrarSeccion(), declarada mas abajo que añade la clase "mostrar-seccion" en su propio codigo.
            
            //Agrega mostrar-seccion donde dimos click
                    const seccion = document.querySelector(`#paso-${pagina}`);
                    
                    seccion.classList.add('mostrar-seccion');
                    //----------------------------------------------------

                    // Eliminar la clase de actual en el tab anterior
                    document.querySelector('.tabs .actual').classList.remove('actual');
                    //(Cortamos este codigo para usarlo en la f() mostrarSeccion).
                    //----------------------------------------------------

                    //Agrega la clase de actual en el nuevo tab
                    const tabActual = document.querySelector(`[data-paso="${pagina}"]`);
                    tabActual.classList.add('actual'); 
            */
            //----------------------------------------------------


            //Llamar la funcion de mostrarSeccion
            mostrarSeccion();

            botonesPaginador();

            //console.log(seccion);
        })
   })
}

async function mostrarServicios()
{
    try {
        const resultado = await fetch ('./servicios.json');
        const db = await resultado.json();

        const { servicios } = db;
        
        //Generar el HTML: Creamos una variable nueva que alojará cada valor de "servicios" por el que va a ir iterando.

        servicios.forEach( servicio => {

            const { id, nombre, precio } = servicio; //Destructuring nuevamente: Creamos 3 variables que alojarán los valores en c/u de ellas.
            

        //DOM Scripting (Crearemos el HTML con JS). Que insertaremos en el div de clase ".listado-servicios"

            //Generar nombre de servicio
            const nombreServicio = document.createElement('P');
            nombreServicio.textContent = nombre;
            nombreServicio.classList.add('nombre-servicio');

            //Generar precio de servicio
            const precioServicio = document.createElement('P');
            precioServicio.textContent = `$ ${precio}`//Template String
            precioServicio.classList.add('precio-servicio');

            //Generar div contenedor de servicio
            const servicioDiv = document.createElement('DIV');
            servicioDiv.classList.add('servicio');
            servicioDiv.dataset.idServicio = id;

            //Selecciona un servicio para la cita: Creamos un evento para el click en alguno de los servicios y que ejecute la funcion "seleccionarServicio" que declararemos mas abajo.
            servicioDiv.onclick = seleccionarServicio;

            //Inyectar precio y nombre al div de servicio
            servicioDiv.appendChild(nombreServicio);
            servicioDiv.appendChild(precioServicio);

            document.querySelector('#servicios').appendChild(servicioDiv);

            
            //console.log(nombreServicio);
            //console.log(precioServicio); */


        })

    }
    catch (error) {
        console.log(error);
    }

    
}

/* Podemos verificar mediante mensajes en consola asignando las variables consultadas del try/catch para ver si existen y asi poder ir validando, en el momento de la construccion del codigo. */


function seleccionarServicio(e)
{   
    /* Aclaracion: La idea es que asigne un id al div seleccionado para luego traer ese dato para poder identificarlo. Sucede que onClick se aplica al div (padre) pero tambien a los elementos hijos (los 2 párrafos). Y cuando se de click en algun de esos elementos dará undefined ya que el id generado se generará en el div unicamente. Para ello crearemos una manera en la que si se da que se de click en alguno de sus elementos hijos se cambie al elemento padre (el div). 
    
   */

    let elemento;

    //Forzar que el elemento al cual le damos click sea el DIV
    if(e.target.tagName === 'P')
    {   
        elemento = e.target.parentElement;
       // console.log('Click en el Párrafo') 
       // "parentElement": Sentencia que indica que apunte hacia el elemento padre.        
       
    } else 
        {
            elemento = e.target;
           // console.log('Click en el DIV')           
        }

       // console.log(elemento);

    //Ahora añadimos una clase para cuando se seleccione y se deseleccione tambien darle estilo correspondiente. Controlaremos esto mediante "conteins" que controla si esta contenido un elemento y definimos que palabra controlar.

    //-Despues trabajaremos con esta misma funcion, añadiendo otras 2 que mandarán a llamar a otras funciones que nos serviran para llevar el dato de cuales estas seleccionadas y asi crear agregarlas o no en el resumen (video 16-Agregar o eliminar servicios).
     
    if(elemento.classList.contains('seleccionado'))
    {
        elemento.classList.remove('seleccionado');

        //console.log(elemento.dataset.idServicio);
        const id = parseInt( elemento.dataset.idServicio );
        eliminarServicio(id); 

    } else
        {
            elemento.classList.add('seleccionado');
            
            //console.log(elemento);
            const servicioObj = {
                id: parseInt( elemento.dataset.idServicio ),
                nombre: elemento.firstElementChild.textContent,
                precio: elemento.firstElementChild.nextElementSibling.textContent
            }

            //console.log(servicioObj);
            agregarServicio(servicioObj); 
        }

    //console.log('Click en Servicio');
    //console.log(elemento.dataset.idServicio); 
    //console.log(servicioObj);
}


function eliminarServicio(id) {
   //console.log('Eliminando...',id);

   const { servicios } = cita;
   cita.servicios = servicios.filter( servicio => servicio.id !== id );

   //console.log(cita);

}



function agregarServicio(servicioObj) {
    //console.log('Agregando...');

    const { servicios } = cita;

    cita.servicios = [...servicios, servicioObj];
    //Lo que hacemos con los  es copiar el elemento "servicios" mediante los 3 puntos y crear un elemento nuevo (arreglo "cita.servicios"), añadiendole tambien los valores de servicioObj que traemos desde la f() seleccionarServicio.

    //console.log(cita);
}



function paginaSiguiente() {
    
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', ()=>{
        pagina++;

        console.log(pagina);

        botonesPaginador(); //-Dado que esta funcion se ejecuta cuando esta preparado el documento ('DOMContentLoaded'), la variable pagina es = 1 y trabajamos con ese valor para incrementar o decrementar, pero debemos de comprobar nuevamente en que pagina se encuentra luego de haber cambiado el valor de "pagina" para que al pasar por los if compare e indique si debe ocultar o mostrar segun corresponda.
    });

    //console.log('Siguiente');
}

function paginaAnterior() {

    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', ()=>{
        pagina--;

        console.log(pagina);

        botonesPaginador(); //Aclaracion de esto en la f() anterior.
    });    
    //console.log('Anterior');
}


function botonesPaginador() {
    const paginaSiguiente = document.querySelector('#siguiente');
    const paginaAnterior = document.querySelector('#anterior');

    if(pagina === 1) {
        //console.log('El boton de anterior no se debe mostrar');
        paginaAnterior.classList.add('ocultar');
    } /* else if (pagina === 2) {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar'); 
    }*/ 
    else if (pagina === 3) {
        paginaSiguiente.classList.add('ocultar');
        paginaAnterior.classList.remove('ocultar');

        mostrarResumen(); //Una vez que hallamos seleccionado el servicio + datos del cliente, osea este todo listo deberemos de volver a llamar a esta funcion para que vuelv a procesarla, ya que inicialmente se ejecutaba unicamente cuando el documento estaba listo (inicialmente con sentencia DOMContentLoaded) estando el objeto "cita" vacio y dando que faltaban datos por defecto. Ahora que estan cargados deberá validar nuevamente.

    } else {
        paginaAnterior.classList.remove('ocultar');
        paginaSiguiente.classList.remove('ocultar');
    }

    mostrarSeccion(); //Cambia la seccion que se muestra la pagina
}



function mostrarResumen() {

    //Destructuring 
    const { nombre, fecha, hora, servicios } = cita;

    //Seleccionar el resumen
    const resumenDiv = document.querySelector('.contenido-resumen');

    //Limpia el HTML previo

    //resumenDiv.innerHTML=''; 
    //-Lo limpiará pero no está bien hacerlo de esa forma ya que este tarda 20 o 30 veces mas tiempo en ejecutarse que atravez de while que sentenciamos a continuacion.
    
    while(resumenDiv.firstChild) {
        resumenDiv.removeChild( resumenDiv.firstChild );
    }


    //Validacion de objeto (verifica si es cierto que esta vacio)
    if(Object.values(cita).includes('')) {

        const noServicios = document.createElement('P');

        noServicios.textContent = 'Faltan datos de servicios, hora, fecha o nombre';

        noServicios.classList.add('invalidar-cita');

        //Agregar a resumenDiv (nueva clase, si es que no llenó alguno de los servicios)
        resumenDiv.appendChild(noServicios);

       // console.log('El objeto esta vacio'); 
       //Mostrará ese mensaje por consola, pero si tiene datos cargados, dejará de mostrarlo.

       return;
    } 
        /* else //Este else se desactiva, ya que no sera necesario dejar esta alternativa, en muchos casos cuando no hace falta else en el if ponen return y asi es como quedará;
        {
            console.log('Todo bien, vamos a mostrar resumen');
        } */

            //console.log(Object.values(cita))
            // console.log(cita);

   //Mostrar el resumen
    
   //Insertamos titulo al HTML
    const headingCita = document.createElement('H3');
    headingCita.textContent = 'Resumen de Cita';   

      

    //Insertamos HTML a Resumen (nombre).
    const nombreCita = document.createElement('P');

    //nombreCita.textContent = `<span>Nombre:</span>${nombre}`;

    //Aclaracion: Si usamos textContent para añadir al HTML este añadirá texto y como acá cuando pasamos una etiqueta la tratará como texto tambien. Entonces para que tome como etiquetas HTML usamos "innerHTML" para insertar.

    nombreCita.innerHTML = `<span>Nombre:</span> ${nombre}`;
    //console.log(nombreCita);
    
    


    //Insertamos HTML a Resumen (fecha).
    const fechaCita = document.createElement('P');
    fechaCita.innerHTML = `<span>Fecha:</span> ${fecha}`;
    //console.log(fechaCita);

    


    //Insertamos HTML a Resumen (hora).
    const horaCita = document.createElement('P');
    horaCita.innerHTML = `<span>Hora:</span> ${hora}`;
    //console.log(horaCita);

    

    //Creamos variable nueva, para crear div que alojará el HTML de servicio + precio. No podemos usar alguna clase existente ya que los objetos "textoServicio" y "precioServicio" existen solo DENTRO de la funcion que itera a "servicios". Una vez creado lo usamos en (colocar texto y precio en el div).

    const serviciosCita = document.createElement('DIV');
    serviciosCita.classList.add('resumen-servicios');


    //Creamos un heading (h3) para agregar al resumen, para aclarar y que quede mejor la vista de estos en la pagina.
    const headingServicios = document.createElement('H3');
    headingServicios.textContent = 'Resumen de Servicios';   

    serviciosCita.appendChild(headingServicios);    
    

    let cantidad = 0; //La usaremos para sacar el total de los servicios. Ponemos la sentencia fuera porque si estuviera dentro de forEach se reiniciaria en 0 cada vez que valla iterando.


    //Iterar sobre el arreglo de servicios
    servicios.forEach( servicio => {
        const {nombre, precio} = servicio;
        const contenedorServicio = document.createElement('DIV');
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.textContent = precio;
        precioServicio.classList.add('precio');//Le alregamos otra clase div adicional para darle estilo css.

        //--------------------------------------
        //Creamos las variables para extraer el precio y hacer con ella la sumatoria de todos los servicios.

        const totalServicio = precio.split('$'); //Usamos slit() para separar el valor (el simbolo $ + 80 por ej). Y trim() para quitar el espacio " 80". Por ultimo parseInt para pasar a entero (nº en azul).

        cantidad +=parseInt(totalServicio[1].trim());

        //console.log(parseInt(totalServicio[1].trim()));
        //console.log(precio);

        //console.log(textoServicio);

        //Colocar texto y precio en el div
        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        serviciosCita.appendChild(contenedorServicio);

    });

    //console.log(cantidad);

    resumenDiv.appendChild(headingCita); 
    resumenDiv.appendChild(nombreCita);
    resumenDiv.appendChild(fechaCita);
    resumenDiv.appendChild(horaCita);

    resumenDiv.appendChild(serviciosCita);

    //Aqui pasamos cantidad al párrafo que creamos e insertaremos al HTML
    const cantidadPagar = document.createElement('P');
    cantidadPagar.classList.add('total');
    cantidadPagar.innerHTML = `<span>Total a Pagar: </span>$ ${cantidad}`;

    resumenDiv.appendChild(cantidadPagar);

}


function nombreCita() {
    const nombreInput = document.querySelector('#nombre');

    nombreInput.addEventListener('input', e => {

        const nombreTexto = e.target.value.trim(); 
        //El método trim( ) elimina los espacios en blanco en ambos extremos del string. Esto sirve en caso de que tengamos dentro del label muchos espacios en blanco, este no los leerá y finalmente guardará en variable lo que sean letras unicamente. Tambien existe "trimStart" que los elimina al comienzo de la palabra y "trimEnd" al final, pero la 1era elimina en ambos sentidos. Y si toma espacios en 1 entre palabras, osea una separacion normal.

        //console.log(nombreTexto);
        //console.log('Escribiendo');
        //console.log(e.target.value); -Sabremos que es lo que el usuario esta escribiendo.

        //Validacion de que nombre texto debe tener algo
        if( nombreTexto === '' || nombreTexto.length < 3 ) {
            
            mostrarAlerta('Nombre no valido','error');
            //console.log('Nombre no valido');

        } else {
            
            const alerta = document.querySelector('alerta');
            if(alerta) {
                alerta.remove();
            }

             cita.nombre = nombreTexto;
            //console.log('Nombre valido');
            console.log(cita);
        }
    });
}


function mostrarAlerta(mensaje, tipo) { //En caso de error o de correcto ingreso de datos en Informacion Cliente

    //Si hay una alerta previa, no crear otra.
    const alertaPrevia = document.querySelector('.alerta');
    if(alertaPrevia) {
        return; //Si existe una alerta entonces no ejecuta todo lo demas que es crear una alerta.
    }

    //console.log('El mensaje es ', mensaje);

    const alerta = document.createElement('DIV');
    alerta.textContent = mensaje;
    alerta.classList.add('alerta');

    if(tipo === 'error')
    {
        alerta.classList.add('error');
    }

            // console.log(alerta);

   //Insertar en el HTML

    const formulario = document.querySelector('.formulario');
    formulario.appendChild(alerta);

  //Eliminar la alerta luego de 3 segundos
    setTimeout( ()=> {
        alerta.remove();
    },3000);

}

function fechaCita() {
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', e => {
        //console.log(e.target.value);

        //El formato obtenido es String por lo que deberemos pasarlo a formato fecha tenemos que pasarlo a su formate mediante Date.

        const dia = new Date(e.target.value).getUTCDay(); 

        //getUTCDay(): Retorna de la fecha, solo el nº del dia en rango de 0 a 6, siendo 0 Domingo etc.

        //De las siguientes formas podemos hacer imprimir en consola y si se quiere utilizar ese formato para mostrar o guardar el dato. En el video comenta todo ya que solo precisa saber si es Domingo para mostrar mensaje de que ese dia no se trabaja.

        /* const opciones = {
            weekday:'long',
            year:'numeric',
            month:'long'
        } */

        //console.log(dia);
        //console.log(dia.toLocaleDateString('es-ES'));
        //console.log(dia.toLocaleDateString('es-ES', opciones));

        if([0, 6].includes(dia)) {

            e.preventDefault();
            fechaInput.value='';
            //Agregamos el prevent porque si bien muestra el mensaje de error, la fecha se agrega igual, asique para prevenir esa carga detenemos la misma. Y le indicamos que fecha sera igual a String vacio para resetear ese valor. De esa manera el valor en el input no se agrega (vuelve a aparecer dd/mm/aaaa).

            mostrarAlerta('Fines de semana no son permitidos', 'error');
            //console.log('Seleccionaste Domingo lo cual no es valido');
        } else {

            cita.fecha = fechaInput.value;

            //console.log('Dia valido');
            //console.log('cita');
        }

    })
}



function deshabilitarFechaAnterior() {


    const inputFecha = document.querySelector('#fecha');

    //var date = new Date().toISOString().substr(0, 19);

    const fechaAhora = new Date();
    const year = fechaAhora.getFullYear(); //Obtenemos año
    //const mes = fechaAhora.getMonth() + 1; //Obtenemos mes (en JS van de 0 a 11)
    //const dia = fechaAhora.getDate() + 1; //Obtenemos dia (ponemos +1 para que no reserven para el mismo dia)

    //De la forma en la que explica en el video no funciona ya que no se expresan en 2 digitos los dias y meses, sino en uno. De la siguiente forma, analizando la web encontre de que manera se estos se expresan en correctamente para que el metodo "min" la tome.
    const mes = ("0" + (fechaAhora.getMonth() + 1)).slice(-2);
    const dia = ("0" + fechaAhora.getDate()).slice(-2);
    

    //console.log("Año: "+year);
    //console.log("Mes: "+mes);
    //console.log("Dia: "+dia);  

    //console.log(dia);
    //console.log(fechaAhora);

    //Formato deseado: AAAA-MM-DD

    const fechaDeshabilitar = `${year}-${mes}-${dia}`;
    //console.log(fechaDeshabilitar);

    inputFecha.min = fechaDeshabilitar;
}



function horaCita() {
    const inputHora = document.querySelector('#hora');

    inputHora.addEventListener('input', e => {

        const horaCita = e.target.value; 
        const hora = horaCita.split(':'); //Array:["0":22,"1":00]

        //Método split(): Sirve para dividir un resultado analizando si hay espacios o algun elemento que separe ese resultado en terminos. Como "hora" expresa como resultado horas y minutos entonce ssi entre () se pone cual es ese elemento que nosotros definiremos hará la division y al resultado lo entregará como un arreglo en este caso de 2 posiciones ([0][1]). Ejemplificamos para las 22hs.

        //console.log(horaTexto);
        //console.log(e.target.value); -Sabremos cual es la hora que el usuario carga

        //Validacion de hora mediante if
        if( hora [0]<10 || hora[0]>18) { //Si hora es menor a 10hs o mayor de 18hs, no se tomarán citas.
             
            mostrarAlerta('Hora no valida','error'); //Llamamos a la f() mostrarAlerta para que muestre el error.

            setTimeout(()=>{
                inputHora.value =''; 
            }, 3000);
            
            //Aparte desabilitamos la hora mal cargada, vuelve a --:-- nuevamente. Lo encapsulamos dentro de un setTimeOut para que lo haga luego de 3s de haberlo ingresado mal.

            //console.log('Hora no valida');

        }  else {
            
            const alerta = document.querySelector('alerta');
            if(alerta) {
                alerta.remove();
            }

             cita.hora = horaCita;
            //console.log('Hora valida');
            //console.log(cita);
        }
    });
}