/* 

//GULP EJECUTA TAREAS QUE SON MUY ABURRIDAS EN CSS EN DEFINICION. EXPLICAREMOS ALGUNAS COSAS Y LUEGO COMPILAMOS SASS CON GULP.

const { series } = require('gulp');


function css (done)
{
    console.log('Compilando... SASS');

    done();
}

function javascript (done)
{
    console.log('Compilando... Javascript');

    done();
}

function minificarHTML (done)
{
    console.log('Minificando...');

    done();
}

exports.css = css;
exports.javascript = javascript;
exports.tareas = series(css, javascript, minificarHTML);

-Para ejecutar "gulp" sin un nombre en especifico como lo es tareas en este ejemplo, especificamos "exports.default".

exports.default = series(css, javascript, minificarHTML);

-Vimos que usamos series para definir el require y ejecuta de manera secuencial cada funcion. Pero podemos usar "parallel" para que ejecute todas al mismo tiempo. Tambien deberemos de especificarlo en el exports.

-Comentamos todo este ejemplo para expliocar como compilar SASS con Gulp.

*/


const { series, src, dest, watch} = require('gulp'); //Multiples funciones usas {}

const sass = require('gulp-sass')(require('sass'));

//Funcion que cimpila SASS

function css()
{   
   return src('src/scss/app.scss')
   .pipe( sass())
   .pipe( dest('./build/css'))
}

function minificarcss()
{
    return src('src/scss/app.scss')

    .pipe( sass({
       // outputStyle: 'expanded' //Como se verá codificado: normalmente
       outputStyle: 'compressed' //Como se verá codificado: comprimido (todo apretado). Pero hace mas liviano el código.
    }))
        
    .pipe( dest('./build/css') )

}

/* -Veremos entonces que los cambios aplicados en gulpfile.js que se hacen enviando el comando en terminal gulp+(nombre de la funcion), se verá reflejado en el archivo css creado (app.css) que está dentro de la carpeta tambien creada por gulp (build y css dentro).

-Para compilar o ejecutar tareas al mismo tiempo que cambian los archivos o se modifican valores en css; por ejemplo cambiamos desde app.scss de Arial a Helvetica y asi poder ver los cambios en app.css tenemos que mandar por terminal el comando que lo realiza "glup css", entonces tenemos que hacer lo sgte; pasamos en el require watch para que mire si hay cambios y si los hay vuelva a ejecutar la tarea.

-IMPORTANTE: Para detener la tarea de un "watch" cerramos terminal integrada o bien CTL+C.

*/

function watchArchivos()
{
    //watch( 'src/scss/app.scss', css );
    watch( 'src/scss/**/*.scss', css );

    // *= La carpeta actual
    // **/* = Todas las carpetas que contiene, con esa extensión.
}

exports.css = css;
exports.minificarcss = minificarcss;
exports.watchArchivos = watchArchivos;
