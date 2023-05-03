<!-- 15. foreach y mostrar el contenido de un array.

Aclaracion: El nombre de este práctico es distinto pero es el correspondiente a los temas que trata, se descompagina ya que en 2 videos habla de un mismo tema, pero es lo mismo. Tema siguiente: 16. Funciones en PHP -->

<?php include 'includes/header.php';

//Explicamos "foreach" aplicado en un práctico del mundo real.
//Creamos un arraglo producto "simulando una dbo", donde cada producto será un arreglo asociativo. Iteraremos en el para traer los resultados de las llaves y valores mendaite foreach.

$productos = [
    [
        'nombre'=>'Tablet', 
        'precio'=>200,
        'disponible'=>true
    ],

    [
        'nombre'=>'Television 24"', 
        'precio'=>300,
        'disponible'=>true
    ],

    [
        'nombre'=>'Monitor Curvo', 
        'precio'=>400,
        'disponible'=>false
    ]
];

/* 
foreach($productos as $producto) {
    
    echo "<pre>";
    var_dump($producto);
    echo "</pre>"; 

        -Con esta sintaxis, veremos la estructura de cada array completo.
        -Con la siguiente sintaxis crearemos los li para poder enlistarlos despues a los valores de los arreglos, pero non es conveniente cargar el servidor con esa tarea, deberemos dejar que el navegador realize la tarea

    echo "<li>";
    echo "Titulo del Producto";
    echo "</li>"; 

        -Entonces crearemos toda la estructura del foreach de la sgte forma:

    foreach($productos as $producto){ ?> 

        -Para que corte la ejecucion PHP en esa seccion, luego en vez de usar los echo de PHP para crear el HTML, como esta fuera de la sentencia de PHP declaramos directamente sintaxis HTML para crearlos:
        
    <li>
        <p>Producto: </p>
    </li>

    <?php

    echo "<pre>";
    var_dump($producto);
    echo "</pre>"; 

    }

        -Una vez que el navegador se halla encargado de crear el HTML volvemos a abrir el PHP para que cierre el } del foreach y complete la ejecucion. Ejecutamos tambien un var_dump que extraerá los valores de los arreglos.

        -Creamos un nuevo foreach mas abajo porque expresar la sitaxis definitiva dentro del que tiene estos comentarios, desactiva los mismos ya que corta con la sintaxis PHP a HTML y da errores
    

    */

    foreach($productos as $producto) { ?>

        <li> <!-- Como vemos, podemos entremezclar PHP y HTML para visualizar los resultados -->

            <p>Producto: <?php echo $producto['nombre']; ?> </p>
            <p>Precio: <?php echo "$ ".$producto['precio']; ?> </p>

            <!-- Operador ternario: Veamos su sintaxis. La aplicamos para extrasar una condicion entre (), seguido de ? si es verdadera y si es falsa : .Esto reemplazaria al if (que tiene mucha sintaxis) como vemos debajo, desactivamos. -->

            <p><?php echo($producto['disponible']) ? 'Disponible' : 'No disponible'  ?></p>
            
        </li>

        <!-- Aplicamos PHP aca tambien para extraer el estado de disponibilidad -->

        <?php 
            /* if($producto['disponible'])
            {
                echo "<p>Disponible</p>";
            } else {
                echo "<p>No disponible</p>";
            } */
        ?>


        <?php

        /* 
        -Como con la anterior sintaxis podemos ya ver los campos y valores en formato HTML, ej:

            Producto: Tablet
            Precio: $ 200
            Disponible

        -Desactivamos el var_dump.

        echo "<pre>";
        var_dump($producto);
        echo "</pre>";  

        */

    }


include 'includes/footer.php';