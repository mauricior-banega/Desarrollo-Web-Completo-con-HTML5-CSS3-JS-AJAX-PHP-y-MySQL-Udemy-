<?php

function obtenerServicios(): array {
    try {

        //Importar una conecion
        require 'database.php';

            /* var_dump($db); -Asi vemos la dbo*/

        //Escribir el codigo SQL
        $sql = "SELECT * FROM servicios;";
        /*-Realizamos el tipo de accion a realizar, en este caso consultar la tabla servicios de "appsalon"  */

        $consulta = mysqli_query($db, $sql);
        /*-Aqui especificamos que esa accion de "consulta a la dbo" se realize a la dbo pasandola ($sql) y la conexion ($db).*/


        //Arreglo vacio
        $servicios =[];


        //Obtener los resultados

        /* echo "<pre>";
        var_dump(mysqli_fetch_assoc($consulta));
        echo "</pre>"; */

        /* Sentencia: mysqli_fetch_assoc
        -Convierte el resultado obtenido de la consulta SQL en un "arreglo PHP" para que el lo pueda entender. 
        
        -Existen muchas sentencias que podemos traer mediante mysqli_fetch. Algunas nos muestran arreglos asociativos, algunas con indices o sin ellas etc. Podemos ir variando para ver los resultados de c/u.

        -Usaremos asssoc, pero nos trae solo un resultado de la dbo, el de id nº1 "Corte de Cabello Niño". Para poder ver los otros deberemos de ingresarlo dentro de un while, para que recorra toda la tabla mostrando todos los servicios. Cortará cuando no encuentre mas elementos/servicios.
        */

        $i = 0;

        while($row = mysqli_fetch_assoc($consulta)) {

            $servicios[$i]['id'] = $row['id'];
            $servicios[$i]['nombre'] = $row['nombre'];
            $servicios[$i]['precio'] = $row['precio'];

            $i++;
            /* echo "<pre>";
            var_dump($row);
            echo "</pre>"; */
        }

        /* -De este while, obtendremos asi cada array de los servicios, formateados con var_dump. Ahora crearemos un array vacio, donde meter todos los valores obtenidos de los arrays individuales, todo en uno solo "$servicios". Insertaremos los valores mediante json_encode, mostrará los resultados en formato var_dump. 
        
        -Ademas incializamos una variable contador de posicion, para que pueda ir guardando (id/nombre/precio) a medida que aumente el valor en una posicion. Y guarde todo en el array vacio $servicios. Aclaro, que $servicios[$i] indica la posicion que tendrá en ese momento.
        */

            /* echo "<pre>";
            var_dump(json_encode($servicios));
            echo "</pre>"; */
        
            /* echo "<pre>";
            var_dump($servicios);
            echo "</pre>"; 
            
            -Veremos como muestra en un solo array todos los otros dentro.

            */

            return $servicios;
            /* Creamos un return, indicando que lo resultante será un array. Por lo tanto en la declaracion de obtenerServicios() indicaremos que es lo que retorna
            
            function obtenerServicios() : array */

    } catch (\Throwable $th) {

        //trow $th;
        var_dump($th);
    }
}

obtenerServicios();
