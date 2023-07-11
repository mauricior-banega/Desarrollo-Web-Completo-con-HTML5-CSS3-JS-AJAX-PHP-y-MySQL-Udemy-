<!-- ACLARACIONES de "base.html":

    -Para crear "anuncio.html" usamos la base plantilla de "base.html" y editamos en el main.

-->

<?php 

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    //var_dump($id);
    if(!$id) {
        header('Location: ../index.php');
    }

//Importamos la conexion
require 'includes/config/database.php';
$db = conectarDB();

//Consultar
$query = "SELECT * FROM propiedades WHERE id = ${id}";

//Obtener los resultados
$resultado = mysqli_query($db, $query);

//Validacion de id de propiedad no existente: Si en la URL se ingresa un id que no existe al validar dirigirá nuevamente al index.

if( ! $resultado->num_rows ) {
    header('Location: ../index.php');
}


$propiedad = mysqli_fetch_assoc($resultado);


    require 'includes/funciones.php';
    incluirTemplate('header2');
?>

    <main class="contenedor seccion contenido-centrado">

        <h1><?php echo $propiedad['titulo'];?></h1>

        <img loading="lazy" src="../imagenes/<?php echo $propiedad['imagen'];?>" alt="imagen de la propiedad">
        

        <div class="resumen-propiedad">
            <p class="precio"><?php echo $propiedad['precio'];?></p>

            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" loading="lazy" src="../build/img/icono_wc.svg" alt="icono wc">
                    <p><?php echo $propiedad['wc'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="../build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p><?php echo $propiedad['estacionamiento'];?></p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="../build/img/icono_dormitorio.svg" alt="icono habitaciones">
                    <p><?php echo $propiedad['habitaciones'];?></p>
                </li>
            </ul>

            <?php echo $propiedad['descripcion'];?>

        </div>

    </main>

<?php 

//Cerramos la conexion
mysqli_close($db);

incluirTemplate('footer'); 

?>