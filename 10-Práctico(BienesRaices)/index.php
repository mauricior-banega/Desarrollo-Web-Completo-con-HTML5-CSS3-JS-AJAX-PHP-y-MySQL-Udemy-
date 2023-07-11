<!-- ACLARACIONES de "index.php":
1-El href con sintaxis "/" significa que redirigirá al inicio o index de la pagina web si lo selecionamos.
 - Sucede que no funciona, es decir cuando se toca en el logo muestra el directorio raiz del proyecto y no el index.php asique se lo reemplazaré.

 2 - En el ultimo tema del curso tratamos sobre el "modo oscuro" (Luna) o "darkmode" del cual creamos todo esto mediante JS modificando el CSS. Ahora tambien podemos ver si desde el SO del usuario tiene predeterminado el tipo de vista, es decir Oscuro/Claro/Automatico.
    -Mediante consola, ejecutando:

     window.matchMedia('prefers-color-scheme: dark');
      
     Podremos ver en "matches" en valor: false y eso sale asi cuando no esta activada el tema dark. Y cuando lo esta "true".
  -Entonces para que directamente cambie a modo dark en caso que el SO este en ese modo (y no tenga que apretar en la luna para activarlo) desde JS en "app.js" en la f() darkMode ahi creamos una variable apartir del metodo window.matchMedia de arriba para utilizarlo y mediante un if de control verificar si esta en true osea activada el dark cambie automaticamente la pagina a modo nocturno.
  -Ademas en caso que este seleccionada en Automatico en el SO tambien creamos esa funcionalidad usando addEventListener('change').
  3-Creamos variable que desde header.php usaremos para crear un operador ternario (que actuará como un if de PHP en una sola linea) que pregunte si esta presente que sea true y agreggue 'inicio' y sino esta que quede vacio (osea que no agregue la clase).
   -De modo que dará verdadero y mostrara correctamente la imagen del header solo en el inicio (osea el index.php) y no para las otras paginas ya que no tendrán la variable si quiera.
   -Sucede que en consola, muestra un Warning que si bien no afecta en el funcionamiento, pone en evidencia la ruta hacia los archivos de la pagina y es vulnerable a hackeos o a la privacidad de la web. Por ello envolvemos lo declarado dentro de un isset. Quedando: ...echo isset($inicio) ? 'inicio' :'';
  -Eso que creamos de isset lo quitamos porque con pasar en la funcion incluirTemplate el valor de inicio, ya hace la comprobacion que corresponde y no mandará errores de vulnerabilidad tampoco.

  NO WORK (FINAL)
  3-La funcion de Dark Mode ya no funciona, sucede que en el video hace referencia a las rutas de los archivos de a cuerdo a como el creo en su video los documentos, y es distinto a como la e creado yo. Por ello tuve que realizar 3 headers para que pudiera cargar bien los estilos pero esto a la vez causo que el JS no aplique correctamente a los headers creados, donde aparece la luna en todos ellos pero no ejecuta la funcionalidad porque las rutas son distintas.

-->

<?php 
    
   
    $inicio = true; //Creamos variable PHP (3)
    /* -Porque esteticamente es mejor que no quede en la sentencia la ruta del template, creamos en funciones.php una F() que alojará la ruta y la mandaremos a llamar especificando que segmento es, en este caso sera header. Sentenciamos mediante require porque es un llamado mas complejo.

    include 'includes/templates/header.php';  */

    require 'includes/funciones.php';

    incluirTemplate('header', $inicio = true);

?>

    
    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi rerum assumenda, dolore odio repellendus repellat suscipit soluta expedita quia laboriosam ipsum nobis molestiae cupiditate est quis. Dolor totam eos quisquam.
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi rerum assumenda, dolore odio repellendus repellat suscipit soluta expedita quia laboriosam ipsum nobis molestiae cupiditate est quis. Dolor totam eos quisquam.
                </p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi rerum assumenda, dolore odio repellendus repellat suscipit soluta expedita quia laboriosam ipsum nobis molestiae cupiditate est quis. Dolor totam eos quisquam.
                </p>
            </div>
        </div>
    </main>


    <section class="seccion contenedor">
        <h2>Casa y Dptos en Venta</h2>

        <?php 
            
            $limite = 3;
            include 'includes/templates/anuncios.php'; 
        
        ?>

        <div class="alinear-derecha">
            <a href="anuncios.php" class="boton boton-verde">Ver Todas</a>
        </div>

    </section>

    <section class="imagen-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.php" class="boton-amarillo">Contáctanos</a>
    </section>


    <div class="contenedor seccion seccion-inferior">

        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                       <source srcset="build/img/blog1.webp" type="image/webp">
                       <source srcset="build/img/blog1.jpg" type="image/jpeg">
                       <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Terraza en el techo de tu casa</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>
                            Consejos para construir una terraza en el texto de tucasa con los mejores materiales y ahorrar dinero.
                        </p>
                    </a>
                </div>
            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                       <source srcset="build/img/blog2.webp" type="image/webp">
                       <source srcset="build/img/blog2.jpg" type="image/jpeg">
                       <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                    </picture>
                </div>

                <div class="texto-entrada">
                    <a href="entrada.php">
                        <h4>Guía para la decoración de tu hogar</h4>
                        <p class="informacion-meta">Escrito el: <span>20/10/2021</span> por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio.
                        </p>
                    </a>
                </div>
            </article>

        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>

            <div class="testimonial">
                <blockquote>
                    El personal se comportó de excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Mauricio Banega</p>
            </div>
        </section>
    </div>


    <?php incluirTemplate('footer'); ?>
    
    

