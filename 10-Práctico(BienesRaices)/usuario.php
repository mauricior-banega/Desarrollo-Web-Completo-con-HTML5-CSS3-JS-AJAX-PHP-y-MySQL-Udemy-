<?php 

//Importar la conexión
require 'includes/config/database.php';
$db = conectarDB();


//Crear email y password
$email = "correo@correo.com";
$password = 123456;

/* HASHEANDO PASSWORD

-Si hasheamos mediante md5 mostrará: "e10adc3949ba59abbe56e057f20f883e", pero es inseguro. Si otro usuario crear la misma clave esta clave md5 será igual y por ello lo inseguro.
-En reemplazo se utiliza "password_hash".
-Este contiene muchos tipos de hasheado que podemos usar con ese método, aplica 60 caracteres a esa conversion. Por eso en el campo de la dbo usamos char(60).
-No usamos varchar(60) porque de arranque sabemos que no se va a ajustar el valor, osea siempre sera 60 y no menos.
*/

//var_dump(md5($password));

$passwordHash = password_hash($password,PASSWORD_DEFAULT);

//var_dump($passwordHash);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('${email}','${passwordHash}')";

//echo $query;
//exit;

//Agregarlo a la dbo
mysqli_query($db, $query);
