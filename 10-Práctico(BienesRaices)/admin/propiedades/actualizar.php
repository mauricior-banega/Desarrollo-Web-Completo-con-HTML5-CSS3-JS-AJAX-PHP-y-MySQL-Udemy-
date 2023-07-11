<?php 
/* ACLARACIONES: 

-Para crear actualizar.php copiamos/pegamos crear.php, y lo editamos ya que la estructura es similar. En base a ella modificaremos para crear este archivo. Se quitan los comentarios en ese archivo realizado.

-En este documento mostraremos el mismo formulario de crear.php pero traeremos ya los datos de la propiedad que elegimos para actualizar ya directamente impresos en el formulario, de manera que el cliente cambie y tambien recuerde cuales campos desea editar.

*/
    //Validador de sesion
    require '../../includes/funciones.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header('Location: ../index.php');
    }

    /* echo "</pre>";
    var_dump($_GET);
    echo "</pre>"; 
    -Muestra: array(1) { ["id"]=> string(1) "3" } */

    //Realizamos una validacion de URL DE id válido: Si ingresa nº lo acepta, si ingresa otra cosa da como respuestado bool(false). Por lo que si asi fuera aplicamos un if que controlará que si da falso, redirija a admin. Ej: ...admin/propiedades/actualizar.php?id=3

    $id= $_GET['id'];
    $id= filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header("Location:../../admin/");
    }

    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    //Obtener datos de la propiedad
    $consulta = "SELECT * FROM propiedades WHERE id=${id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    /* echo "</pre>";
    var_dump($propiedad);
    echo "</pre>";  */

    //Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);



    //Arreglo con mensajes de errores (Validador)
    $errores =[];



    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedorId'];

    //No es recomendable llenar osea traer de la dbo el campo de "imagen" (ya que se completaria toda la ruta alli mismo), ya revelaria la ubicacion de los archivos en la dbo. Por lo que la traeremos y mostraremos por fuera de ese campo para que el cliente pueda ver la imagen y saber cual esta para cambiarla, subiendo otra o no.

    $imagenPropiedad = $propiedad['imagen'];



    if($_SERVER['REQUEST_METHOD'] === 'POST') 
    {

    echo "<pre>";  
    var_dump($_POST); 
    echo "</pre>";

    //exit;

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

    /* -Quitamos que sea requerimiento subir si o si una imagen para actualizar. Deja de ser obligatorio.

        if(!$imagen['name'] || $imagen['error']) {
        $errores[] = "La imagen es obligatoria"; 
        
    } */

    $medida = 1000 * 1000; 

    if($imagen['size'] > $medida) {
        $errores []= "La imagen es muy pesada";
    }



    //Revisar que el arreglo de errores este vacio, si lo esta se cargará los datos en la dbo.
        if(empty($errores)) {

        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';    
        
        if(!is_dir($carpetaImagenes)) { 

            mkdir($carpetaImagenes);

        } 
        
        $nombreImagen ='';


        /**SUBIDA DE ARCHIVOS**/
        //-Pero antes preguntamos si existe ya una imagen, elimine la imagen anterior. Esto es para que no sature de imagenes (la anterior y la nueva) la dbo.

        if($imagen['name']) {
            //Eliminar la iamgen previa; usando la f() "unlink" que sirve para ello.

            unlink($carpetaImagenes . $propiedad['imagen']);
            //-Ahora, si actualizamos sin subir imagen alguna, de todas forma eliminará la que estaba cargada. Par que no suceda pasamos el bloque de Generar nombre unico & Subir imagen dentro del if que controla si existe. En caso de no haber cargado imagen nueva, la imagen será la misma que la que estaba antes manteniendo el nombre que tenia ya.

            //Generar un nombre único
            $nombreImagen = md5 ( uniqid( rand(), true )) . ".jpg" ;

            // Subir la imagen

            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);
            
        }  else  {
            $nombreImagen = $propiedad['imagen'];
        }


        //Actualizar en la dbo: Directamente actualizaremos todos los campos de la dbo. Muchos crear comprobaciones uno a uno para ver cual campo es el que se modifico para cambiarlo pero es mucho trabajo para que la dbo realize, por lo que es mejor reescribir todo el contenido, icnluso si solo hay que cambiar el titulo por ejemplo.

        $query = "UPDATE propiedades SET titulo ='${titulo}', precio ='${precio}', imagen ='${nombreImagen}', descripcion ='${descripcion}', habitaciones =${habitaciones}, wc =${wc}, estacionamiento =${estacionamiento}, vendedorId =${vendedorId} WHERE id=${id} ";
        
        //Recomendacion: Copiar todo el UPDATE y en TablePlus en pestaña "SQL" pegarlo y ejecutarlo, de esa manera sabremos si esta bien realizada, para ver donde esta un posible error si lo hubiera mas rapidamente.

        //echo $query;
        //exit;


        $resultado = mysqli_query($db, $query);

        if($resultado) {

            header("Location:../../admin/?resultado=2"); //Aplicamos QueryString

         }
        
        }

    }

    //Traemos el header a este documento
     incluirTemplate('header3');
?>

    <main class="contenedor seccion">

        <h1>Actualizar Propiedad</h1>

        <a href="../../admin/" class="boton boton-verde">Volver</a>

        <?php foreach ($errores as $error): ?>
        <div class="alerta error">
             <?php echo $error; ?>
        </div>
        <?php endforeach; ?>


        <form class="formulario" method="POST" enctype="multipart/form-data"> 

            <fieldset>

                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad" value="<?php echo $titulo; ?>"><!-- 2º -->

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad"  value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="../../imagenes/<?php echo $imagenPropiedad ?>" alt="" class="imagen-small">

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
                    
                </select>

            </fieldset>

           
            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde" >

        </form>

    </main>

    <?php incluirTemplate('footer'); ?>