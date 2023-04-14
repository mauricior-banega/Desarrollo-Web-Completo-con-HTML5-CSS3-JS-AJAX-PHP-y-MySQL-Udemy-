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

//npm audit fix
//npm audit fix --force
*/


const { series, src, dest, watch, parallel} = require('gulp'); //Multiples funciones usas {}

const sass = require('gulp-sass')(require('sass'));

//const imagemin = require ('gulp-imagemin');//Dependencia para minificar el tamaño de imagenes.

const notify = require('gulp-notify'); //Dependencia que sirve para mostrar un mensaje/notificacion sobre algun estado o proceso. La usa en la f() de imagemin que no anda y pasa css, donde si veremos el efecto.


const webp = require('gulp-webp');
const concat = require('gulp-concat');

//Utilidades CSS (*las 3 primeras sirven para optimizar el codigo generado para el css, comprimiendolo y creando etiquetas, el ultimo crea un mapa de ubicacion del css original en caso de requirir cambios, lo podamos hacer por la referencia que otorga).

const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');


//Utilidades JS

const terser = require('gulp-terser-js');
const rename = require('gulp-rename');


/* De esta forma creamos codigo reutilizable que podremos reemplazar en todas las tareas donde tenemos esa ruta en una sola linea. */

const paths = {
    imagenes: 'src/img/**/*',
    scss: 'src/scss/**/*.scss',
    js: 'src/js/**/*.js'
}


//Funcion que compila SASS

function css()
{   
   //return src('src/scss/app.scss')
   return src(paths.scss)

   .pipe( sourcemaps.init() )
   .pipe( sass())
   .pipe( postcss( [autoprefixer(), cssnano() ]) )
   .pipe( sourcemaps.write('.') )
   .pipe( dest('./build/css'))
}

/* 
-Comentamos esta funcion ya que con las dependencias posteriores creadas no hará falta ejecutarla.

    function minificarcss()
{
    //return src('src/scss/app.scss')
   return src(paths.scss)

    .pipe( sass({
       // outputStyle: 'expanded' //Como se verá codificado: normalmente
       outputStyle: 'compressed' //Como se verá codificado: comprimido (todo apretado). Pero hace mas liviano el código.
    }))
        
    .pipe( dest('./build/css') )

} */

/* -Veremos entonces que los cambios aplicados en gulpfile.js que se hacen enviando el comando en terminal gulp+(nombre de la funcion), se verá reflejado en el archivo css creado (app.css) que está dentro de la carpeta tambien creada por gulp (build y css dentro).

-Para compilar o ejecutar tareas al mismo tiempo que cambian los archivos o se modifican valores en css; por ejemplo cambiamos desde app.scss de Arial a Helvetica y asi poder ver los cambios en app.css tenemos que mandar por terminal el comando que lo realiza "glup css", entonces tenemos que hacer lo sgte; pasamos en el require watch para que mire si hay cambios y si los hay vuelva a ejecutar la tarea.

-IMPORTANTE: Para detener la tarea de un "watch" cerramos terminal integrada o bien CTL+C.

*/


function javascript()
{
    return src(paths.js)
    .pipe(sourcemaps.init())
    .pipe( concat('bundle.js'))
    .pipe( terser() )
    .pipe(sourcemaps.write('.'))
    .pipe( rename({ suffix:'.min' }))
    .pipe( dest('./build/js') ) 
}

//NO FUNCIONA "GULP IMAGEMIN": Ver en ACLARACIONES.txt 

function imagenes() //Tarea nueva de minificar imagenes
{
    //return src('src/img/**/*')
    //Buscara en todas las imagenes ** y con el otro * indicamos que busque incluso dentro de otras carpetas.

   
    return src(paths.imagenes)

    .pipe( imagemin() )
    .pipe( dest( './build/img' ))
    .pipe( notify({message: 'Imagen Minificada'}));
}

function versionWebp ()
{
    return src(paths.imagenes)
    .pipe( webp() )
    .pipe( dest( './build/img' ))
    .pipe( notify({message: 'Version WebP Lista'}));
}


function watchArchivos()
{
    //watch( 'src/scss/app.scss', css );
    watch( paths.scss, css );

    // *= La carpeta actual
    // **/* = Todas las carpetas que contiene, con esa extensión.

    watch(paths.js, javascript);
}


exports.css = css;
//exports.minificarcss = minificarcss;
exports.imagenes = imagenes;
exports.watchArchivos = watchArchivos;
exports.default = series (css, javascript, versionWebp, watchArchivos);
