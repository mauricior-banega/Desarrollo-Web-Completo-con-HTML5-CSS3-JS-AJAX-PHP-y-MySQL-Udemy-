<!-- 12. if, else if y switch -->


<?php include 'includes/header.php';


$autenticado = true;
$admin = false;


//if($autenticado && $admin)
if($autenticado || $admin){
    echo "Usuario autenticado correctamente";
} else {
    echo "Usuario no autenticado. Inicie sesion";
}

//If Animados
$cliente = [
    'nombre' => 'Juan',
    'saldo' => 0,
    'informacion' => [
        'tipo' => 'Premium'
    ]
    ];

 echo "<br>";

//if( empty($cliente)): Ver si cliente esta vacio
//if( !empty($cliente)): El (!) niega la condicion.

if( !empty($cliente)) {
    echo "El arreglo de cliente no esta vacio";

    if($cliente['saldo'] > 0) {
        echo "El cliente tiene saldo disponible";
    } else {
        echo "No hay saldo";
    }
}


echo "<br>";


//Else If
if($cliente['saldo'] > 0 ) {
    echo "El cliente tiene saldo";
} else if ($cliente['informacion']['tipo'] === 'Premium') {
    echo "El Cliente es Premium";
} else {
    echo "No hay cliente definido|Sin saldo|No es Premium";
}

//Switch

/* $tecnologia = 'PHP'; */
$tecnologia = 'Javascript';

switch($tecnologia) {
    case 'PHP':
        echo "PHP, es un exelente lenguaje";
        break;

    case 'Javascript':
        echo "Genial, el lenguaje de la web";
        break;

    case 'HTML':
        echo 'Emmm...';
        break;

    default:
    echo "Algún lenguaje que no conozco";
}



include 'includes/footer.php';