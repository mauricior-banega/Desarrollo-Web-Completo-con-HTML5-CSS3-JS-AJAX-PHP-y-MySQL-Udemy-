<!-- ACLARACIONES de "header.php":
-Voy a crear otro archivo header.php porque para index.php (el nuevo) no aplica los estilos añadiendo solamente una "/" al build, al href como a las imagenes. Estas solas las declaraciones:

<link rel="stylesheet" href="/build/css/app.css">
<img src="/build/img/logo.svg" alt="Logotipo de Bienes Raices"> etc...

-No funcionaba, osea no apuntaba al directorio raiz y cargaba los estilos como aparece en el video. Unicamente anduvo modificando la ruta saliendo del directorio 2 veces y no una como indica en el video, quedando: 

    <link rel="stylesheet" href="../../build/css/app.css">
    <img src="../../build/img/logo.svg" alt="Logotipo de Bienes Raices">

Esto permite que se carguen los estilos para crear.php/actualizar.php/borrar.php pero no para index que esta fuera del directorio de esos creados. Entonces tuve que crear como decia un header2 que tenga la ruta correcta y pueda darle estilos al index.php nuevo.


-->

<?php

    //$cerrarsesionheader=1;

    if(!isset($_SESSION)) { //1
        session_start();
    }
    
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="build/css/app.css">
    

</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' :''; ?> "> 
        <div class="contenedor contenido-header">
            <div class="barra">
                <!-- <a href="/"> -->
                    <a href="index.php">
                <img src="build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="build/img/dark-mode.svg">
                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            </div><!-- .barra -->

            <?php 

            //Operador ternario: Verifica si es inicio true, si lo es agrega este titulo.
            
            echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : '';
             
            ?>
            
        </div>

    </header>