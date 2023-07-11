<!-- ACLARACIONES:
-En todos los archivos, las rutas son diferentes a las que muestra en el video. Asique tener mucho cuidado con los a href que crear o establece y validarlos a todos porque daba error en todos. Igual ya estan corregidos. 

1-Creamos un "input" de tipo hidden (osea que no se ve en el documento) para enviar datos del id del input que esta dentro del form que envia mediante POST el valor para saber cual es la propiedad que se deseea eliminar.

-->

<?php 

    /* Mediante GET extraemos el QueryString de la ruta una vez que se cargan los datos del formulario y nos redirige a admin. Comentamos las pruebas aplicadas del práctico, veremos que mostrará:
        array(1) { ["mensaje"]=> string(24) "Registrado Correctamente" }
    Debido a que en la ruta pasamos dos valores "mensaje=Registrado Correctamente" y "resultado=1"
    Por ultimo veremos que se guarda un arreglo con esos valores y que usaremos para insertar HTML/PHP en el documento usandolos.
    */   

    /* echo "</pre>";
    var_dump($_GET);
    echo "</pre>";

    exit; */

    //Validador de sesion
    require '../includes/funciones.php';
    $auth = estaAutenticado();

    var_dump($auth);

    if(!$auth) {
        header('Location: ../index.php');
    }



    //De igual forma comento como lo hicimos de comienzo, porque despues creamos esto en una f() para hacer no repetitivo el mismo y mas corto como arriba.

    /* session_start();

    echo "</pre>";
    var_dump($_SESSION);
    echo "</pre>";

    $auth = $_SESSION['login']; //Traemos el true o false
    $auth = false;        

    if(!$auth) {
        header('Location: ../index.php'); //Si es incorrecto redirige a otra pagina.
         
    } */



    
    //Importar la conexion
    require '../includes/config/database.php';
    $db = conectarDB();    

    // Escribir el Query
    $query = "SELECT * FROM propiedades";

    //Consultar DBO
    $resultadoConsulta = mysqli_query($db, $query);    

    //Muestra mensaje condicional
    //$mensaje = $_GET['mensaje'];
    $resultado = $_GET['resultado'] ?? null;

    //Creamos la variable $id apartir del campi 'id' que podemos extraer del REQUEST. Si la sentencia se hiciera por fuera seria undefined. Y validamos que el valor que se ingrese sea un entero. Si es verdadero eliminará y sino 

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            //Eliminar el archivo (imagen)
            $query = "SELECT imagen FROM propiedades WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);

            //echo $query;
            //var_dump($propiedad);
          
            unlink('../imagenes/'. $propiedad['imagen']);



            //exit;

            //Eliminar la propiedad
            $query = "DELETE FROM propiedades WHERE id= ${id}";

            echo $query;

            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('Location: ../admin/?resultado=3');
            }
        }

        var_dump($id);
    }


    //Incluye un template
    incluirTemplate('header2');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <!-- ?php if($mensaje) {
           echo $mensaje; 
        }? 
        - Podemos mandar a que se vea el contenido de mensaje en la pagina, pero sucede que no se recomienda de hacer. Podemosar entonces el otro valor que pasamos en la ruta, osea resultado con el contenido tambien, insertando si pasa el if un "p" que contendrá el HTML y clases que le darán el estilo. El valor de resultado es un String = 1 por lo que deberemos de pasarlo a int (numerico) antes de compararlo, podemos usar 2 iguales y no 3 para que no compare el tipo de dato, pero para que quede como ejemplo usaremos un método para pasar a numerico la variable "intval".
        - Por ultimo en la URL veremos que si quitamos la parte de resultado (..admin/?mensaje=Registrado%20Correctamente&resultado=1) una vez creado todo correctamente va a dar el sgte error: Advertencia : clave de matriz no definida "resultado" ; y esto es porque nuevamente el GET definido no encuentra a "registro" en la URL porque se quitó y esta definido en el archivo. Por lo que usamos en la misma definicion esta especie "placeholder" que actua como un "isset" y se escribe "?? null". Sirve para indicar que si el valor asignado esta precente que se ejecute, sino que tenga un valor por default de null.
        -->
        
        <?php if(intval($resultado) === 1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <!-- ?php endif; ? -->

        <?php elseif(intval($resultado) === 2): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
        
        <?php elseif(intval($resultado) === 3): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>

        <?php endif; ?>

        <a href="../admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)):  ?>


                <tr>
                    <td><?php echo $propiedad['id']; ?></td>
                    <td><?php echo $propiedad['titulo']; ?></td>
                    <td><img src="../imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>
                    <td>$ <?php echo $propiedad['precio']; ?></td>
                    <td>
                        <form action="" method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['id']; ?>"> <!-- 1 -->
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="../admin/propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>    

    </main>

<?php 

    //Cerrar la conexion
    mysqli_close($db);

    incluirTemplate('footer');
?>