<!-- ACLARACIONES de "nosotros.php":

-->

<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
              <picture>
                <source srcset="build/img/nosotros.webp" image="image/webp">
                <source srcset="build/img/nosotros.jpg" image="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
              </picture>  
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de Experiencia
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi sunt debitis, fugit delectus reprehenderit veniam explicabo non quos inventore aut, corporis vitae expedita deserunt aperiam, velit dolore obcaecati voluptatibus cumque. Veniam explicabo non quos inventore aut, corporis vitae expedita deserunt aperiam, velit dolore obcaecati voluptatibus cumque.</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus nisi sequi neque, soluta vel dicta.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus nisi sequi neque, soluta vel dicta.
                </p>
            </div>
        </div>
    </main>


    <section class="contenedor seccion">
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
    </section>


    <?php incluirTemplate('footer'); ?>