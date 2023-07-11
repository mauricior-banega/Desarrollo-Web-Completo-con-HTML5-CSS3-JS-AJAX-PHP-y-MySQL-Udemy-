<?php 

/* Importar la conexion
-Los require son relactivos al archivo que los a mandado a llamar, es decir que de esta forma que esta sentenciado importamos desde anuncios.php "archivo parcial" (creando la ruta desde index.php "archivo principal" quien contiene a anuncios.php). Pero tambien podriamos hacer la ruta del archivo index.php mediante la sentencia:  require '/includes/config/database.php';  

*/

require __DIR__ . '/../config/database.php';
$db = conectarDB();

//Consultar
$query = "SELECT * FROM propiedades LIMIT ${limite}";

//Obtener los resultados
$resultado = mysqli_query($db, $query);



?>



<div class="contenedor-anuncios">

            <?php while($propiedad = mysqli_fetch_assoc($resultado)): ?>

            <div class="anuncio">
                
                    <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen']; ?>" alt="anuncio">
                    
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio"><?php echo $propiedad['precio']; ?></p>
                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" loading="lazy" src="build/img/icono_wc.svg" alt="icono wc">
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img class="icono"  loading="lazy" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img class="icono"  loading="lazy" src="build/img/icono_dormitorio.svg" alt="icono habitaciones">
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>
                    </ul>

                    <a href="anuncio.php/?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">
                        Ver Propiedad
                    </a>
                </div><!-- .contenido-anuncio -->
            </div><!-- .anuncio -->

        <?php endwhile; ?>

</div><!-- .contenedor-anuncios -->


<?php 
//Cerramos la conexion
mysqli_close($db);
?>