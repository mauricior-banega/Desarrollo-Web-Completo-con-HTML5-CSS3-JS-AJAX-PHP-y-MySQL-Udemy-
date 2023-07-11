<!-- ACLARACIONES:

1- A la hora de validar sea mail como en este caso, siempre deberemos de hacerlo en el Frontend y en el Backend. Osea del lado del cliente, de manera que intuitivamente pueda corregir el acceso (si pusiera como email nada, o un nº o un hola), y del lado del backend tambien. Para ello creamos un método que es "mysqli_real_escape_string", que envolverá a lo ya creado para validar mail filter_var($_POST['email'], FILTER_VALIDATE_EMAIL). En el ademas de pasar esos argumentos de pasa la conexion a la que deberá de aplicar (ya que como dije es la validacion de parte backend del proyecto que deberá tambien de tener).
-esta validacion se puede aplicar tambien al password, de hecho lo haremos.

2- Otra manera de validar en este caso para mail y clave "que los campos no esten vacios" es mediante un "required", y va dentro de cada input.

3 - La funcion "password_verify" verificará/comparará el pass cargado con el de la dbo. Y retornará true, si coincide y false si no.

4 - "session_start()": Es una funcion de PHP que aporta informacion sobre la sesion actual, debe crearse para poder ser usada o vista; por ej en un var_dump, mediante $_SESSION. Esto crea un arreglo, que estará vacio hasta que le carguemos datos. Le cargamos el mail y una variable booleana. Con estos datos podremos usar la sesion para realizar validaciones y accesos. Podremos ver en index.php que al principio (siempre) aplicamos la apertura de sesion mediante la declaracion alli, y podemos traer los datos que contiene, ej imprimirlo en var_dump; veremos entonces en index.php de propiedades:
    array(2) { ["usuario"]=> string(17) "correo@correo.com" ["login"]=> bool(true) }
-->

<?php  

    //Importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();

    //Autenticar el Usuario

    $errores = []; 

    // OJO: var_dump($_POST); -Para ver los resultados de post tenemos que usar SERVER['REQUEST_METHOD'] sino mostrará un arreglo vacio.

    if($_SERVER['REQUEST_METHOD'] ==='POST') {

       /* echo "<pre>"; 
       var_dump($_POST);
       echo "</pre>"; */ 

       $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

       //var_dump($email);

       /* 1 */
       $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email) {
          $errores[]="El email es obligatorio o no es válido";  
        }

        if(!$password) {
            $errores[]="El password es obligatorio";  
        }


        if(empty($errores)) {

           //Revisar si el usuario existe
            $query = "SELECT * FROM usuarios WHERE email ='${email}' ";

            $resultado = mysqli_query($db, $query);
        
            //var_dump($resultado); 

            //Resultado: object(mysqli_result)#2 (5) { ["current_field"]=> int(0) ["field_count"]=> int(3) ["lengths"]=> NULL ["num_rows"]=> int(0) ["type"]=> int(0) } . Vemos que num_rows arroja si es int = 0 no existe usuario, si existe dará 1.

            if( $resultado->num_rows ) {

                //Revisar si el password es correcto.
                $usuario = mysqli_fetch_assoc($resultado);

                    //var_dump($usuario);
                    //var_dump($usuario['password']);

                //Verificar si el password es correcto (3)
                $auth = password_verify($password, $usuario['password']);

                    //var_dump($auth); //bool(true) o false
                    if($auth) {
                        //El usuario está autenticado

                        session_start(); //4

                        //Llenar el arreglo de la sesión 
                        $_SESSION['usuario'] = $usuario['email']; 
                        $_SESSION['login'] = true; 

                        /* echo "<pre>";
                        var_dump($_SESSION);
                        echo "</pre>"; */

                        header('Location: admin/index.php');


                    } else  {
                        $errores[]= "El password es incorrecto";
                    }

            } else {
                //Revisar que el usuario ya existe.
                $errores[]= "El usuario no existe";
            }
       
        }

        /* echo "<pre>";
        var_dump($errores);
        echo "</pre>";
 */
    }





    //Incluye Header
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <!-- Mostramos error en pantalla -->
        <?php foreach ($errores as $error):  ?>
            <div class="alerta error">
                <?php echo $error?>
            </div>
        <?php endforeach; ?>

        <!-- Definimos el metodo POST que llevará la informacion del formulario. Y en action a donde enviará el POST, pero como no esta definido se enviará a quien lo solicite, en este caso al unico que lo hace que es el "if". -->

        <form class="formulario" action="" method="POST"> 
            <fieldset>

                <legend>Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" name ="email" placeholder="Tu Email" id="email" required><!-- 2 -->

                <label for="password">Password</label>
                <input type="password" name ="password" placeholder="Tu Password" id="password" required>

            </fieldset>

            <input type="submit" value="Iniciar Sesión" class="boton boton-verde">

        </form>   

    </main>

    <?php incluirTemplate('footer'); ?>