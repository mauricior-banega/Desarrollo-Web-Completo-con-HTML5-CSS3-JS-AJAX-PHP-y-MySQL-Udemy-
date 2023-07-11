<?php 
/* ACLARACIONES: Error que me llevo dias de corregir:
-En el video el form tiene un "action" a: admin/propiedades/crear.php y resulta que solamente era al archivo crear.php 

2º-Tras realizar la validacion de los campos del formulario donde se cargasen todos los campos menos uno y por ello se borrasen todos los datos cargados antes (errores frustantes de paginas del gobierno) deberemos de cargar en cada "input" un value con el valor de la variable que sentenciamos. Para hacerlo debemos agregar ese value con php en la declaracion, ademas las variables deberan de ser sentenciadas fuera del if de REQUEST METHOD y vacias para que luego de ser asignado el valor luego de pasar por el mismo se guarde en esa variable y se recuerde en caso de error y asi no tener que llenarlo nuevamente. Ej:
    
    value="<?php echo $titulo; ?>

3º- SANITIZAR ENTRADA DE DATOS: Esto sirve para que no inserten codigo SQL en los campos de nuestro formulario para robarlos o borrar los datos (Inyeccion SQL), codigo malicioso que exponga datos alojados y de nuestros clientes. Esto no sucede cuando usamos el tipo de "Orientada a Objetos o PDO" con lo que llamamos "sentencias preparadas" que veremos mas adelante, pero de esta manera en la que estamos ahora si es necesario realizar esta sanitizacion.
 -Para hacerlo se usan "filtros" (de sanaeamiento y validacion entre otros) que son funciones que realizar determinada correccion o validacion devolviendolo correctamente, lo podemos encontrar en el manual de PHP, dejo enlace:
    https://www.php.net/manual/es/filter.filters.php
-Usaremos el método que evita que se carguen codigos SQL y que puedan encapsularlos de manera que no se ejecuten en nuestro documento si son inyectados.

4º- Para subir archivos a PHP (iamgen) en este caso. No debemos de esar la superglobal $_POST para subirlo, sino $_FILES. Ademas debe de especificarse en el formulario la sentencia enctype="multipart/form-data".

4º Creamos una carpeta usando "mkdir", alli en "imagenes" se alojaran justamente las imagenes. Usamos el condicional junto con "is_dir" que sirve para verificar si existe ya la carpeta, en este caso la variable que la crea.

4º.1 Podremos ver que en el arreglo realizado a $_FILES que nos muestra el var_dump hay un campo llamado "tmp_name" y aloja la ruta en donde se aloja temporalmente la imagen, pero que deberemos de mover a la carpeta creada "imagenes". Usamos "move_uploaded_file" que contendra los valores de origen destino y el nombre con el que se guardará.
    Crearemos un metodo junto con otros, para que cree un nombre random unico. Esto se utiliza para que no sobre escriba el nombre de la imagen ya que si le damos un nombre fijo lo hará eliminando la anterior. Por ejemplo su le decimos que se llame archivo la siguiente imagen se borrará siendo la nueva la que quede cargada con el mismo nombre.
    Para ello creamos usamos  "md5" "uniqid" y "rand()" para poder crearlo. Buscar de ser necesario para que sirve cada una de ellas.

    5º- Creamos un QueryString para que se agregue a la ruta de la web que en index.php (en /admin) podamos extrae medainte GET esa ruta y manipular las variables que pasemos y podamos asi insertar HTML una vez que sea efectivo la insersion de los datos cargados en el formulario y no solo muestre un index vacio.

*/


    //Validador de sesion
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: ../index.php');
    }



    //Base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);



    //Arreglo con mensajes de errores (Validador)
    $errores =[];



    $titulo = '';
    $precio = '';
    $descripcion = '';
    $habitaciones = '';
    $wc = '';
    $estacionamiento = '';
    $vendedorId = '';


   
    //var_dump($db);

    /* echo "<pre>";
    var_dump($_POST);
    echo "</pre>"; */

    /* echo "<pre>";
    var_dump($_SERVER);
    echo "</pre>"; */
    

    /* Ejecutamos el código después que el usuario envia el formulario
    -Usamos pre+vardump en $_SERVER (elemento REQUEST_METHOD)y validar so el metodo es POST para que mostrar los valores cargados en el formulario. */

    if($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
        /* echo "<pre>";
        var_dump($_POST);
        echo "</pre>"; */

        /* echo "<pre>";
        var_dump($FILES);
        echo "</pre>"; */

        //exit; Esto hace que lea y ejecute hasta este punto y lo demas no.
    

    $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
    $precio = mysqli_real_escape_string( $db,$_POST['precio'] );
    $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
    $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
    $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
    $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
    $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
    $creado = date('Y/m/d');
    

    //Asignar files hacia una imagen

    $imagen = $_FILES['imagen'];

        /* echo "<pre>";
        //var_dump($imagen);
        var_dump($imagen['name']);
        echo "</pre>";

        exit;  */


    

    if(!$titulo) {
        $errores[]="Debes añadir un titulo";
    }

    if(!$precio) {
        $errores[]="El precio es obligatorio";
    }

    if(strlen($descripcion) < 50) {
        $errores[]="La descripcion es obligatoria y un minimo de 50 carácteres";
    }

    if(!$habitaciones) {
        $errores[]="El número de habitaciones es obligatorio";
    }

    if(!$wc) {
        $errores[]="El número de baños es obligatorio";
    }

    if(!$estacionamiento) {
        $errores[]="El el número de lugares de estacionamiento es obligatorio";
    }

    if(!$vendedorId) {
        $errores[]="Elige un vendedor";
    }

    if(!$imagen['name'] || $imagen['error']) {
        $errores[] = "La imagen es obligatoria"; 
        //Otro momento donde PHP no carga la imagen es cuando se sube una imagen de 2Mb o más (valor por defecto). Por ello si es lo que sucede, hay que mostrar el error, aunque no sea la causa exacta.
    }

    //Validar por tamaño (1mb máximo). Como 'size' expresa el peso en bites, pasamos los 1000kb=1mb x 1000bites para ponerlo como tope maximo y validar.

    $medida = 1000 * 1000; 

    if($imagen['size'] > $medida) {
        $errores []= "La imagen es muy pesada";
    }

    /* echo "<pre>";
    var_dump($errores);
    echo "</pre>";

    exit; */



    //Revisar que el arreglo de errores este vacio, si lo esta se cargará los datos en la dbo.
        if(empty($errores)) {

        /**SUBIDA DE ARCHIVOS**/

        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';    
        
        if(!is_dir($carpetaImagenes)) { /* 4 */

         mkdir($carpetaImagenes);

        }   

        /* 4.1 */

        //Generar un nombre único
        $nombreImagen = md5 ( uniqid( rand(), true )) . ".jpg" ;

        // Subir la imagen

        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        /* exit; */


                //Insertar en la dbo
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedorId) VALUES ('$titulo','$precio','$nombreImagen','$descripcion','$habitaciones','$wc','$estacionamiento','$creado','$vendedorId')";

        /* echo $query; */

        $resultado = mysqli_query($db, $query);

        if($resultado) {
            /* echo "Insertado correctamente"; 

            -Redireccionamos al usuario

            -En vez de mostrar que se cargo correctamente y para evitar datos a la dbo duplicados. Creamos una "redireccion" a admin(nuestro index) de manera que tengan que cargar nuevamente los campos del formulario. Importante aclarar que esta sentencia solamente funcionará cuando en el documento no halla ninguna sentencia HTML previamente. Osea no la poriamos poner en ninguna linea posterior al main por ejemplo porque daria error.
            */

            header("Location:../../admin/?mensaje=Registrado Correctamente&resultado=1"); //Aplicamos QueryString (5)

         }
        
        }

    }

    //Traemos el header a este documento
    incluirTemplate('header3');
?>

    <main class="contenedor seccion">

        <h1>Crear</h1>

        <a href="../../admin/" class="boton boton-verde">Volver</a>



        <!-- Aqui creamos un foreach para que recorra todo el arreglo y muestre en el documento los errores arrojados por no llenar los campos requeridos -->

        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
             <?php echo $error; ?>
        </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST" action="crear.php" enctype="multipart/form-data"> <!-- "action": Solamente debe apuntar a "crear.php" -->

            <fieldset>

                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>"><!-- 2º -->

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad"  value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <label for="descripcion">Descripción</label>
                <textarea id="descripcion" name="descripcion"> <?php echo $descripcion; ?> </textarea>
            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend> 

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9"  value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9"  value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9"  value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>

                <legend>Vendendor</legend> 

                <select name="vendedor">
                    <option value="">-- Seleccione --</option>

                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>

                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre']." ".$vendedor['apellido']; ?> </option>

                    <?php endwhile; ?>
                    <!-- -Comentamos, ya que extraeremos desde la consulta a la dbo creada arriba para obtener los vendedores de la dbo directamente, usando fetch assoc(). El while se ejecutará a medida que encuentre filas o rows en la tabla "vendedores" en este caso. Por ello es que creamos los option con lso valores que obtenga de ellos.
                        -Por otro lado veremos que el option tiene un operador ternario (es un if de una linea basicamente), que compára que la variable de vendedorId sea la misma que la de la dbo $variable['id]; de la que si coincide asigna el codigo HTML "selected" que mandara el echo para que sea seleccionado y recordado en el formulario y no tenga que elegirse nuevamente tampoco.
                
                    <option value="1">Juan</option>
                    <option value="2">Karen</option> -->
                </select>

            </fieldset>

           
            <input type="submit" value="Crear Propiedad" class="boton boton-verde" >

        </form>

    </main>

    <?php incluirTemplate('footer'); ?>