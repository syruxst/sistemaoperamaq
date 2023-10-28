<?php
session_start();
require_once('../admin/conex.php');
$usuario = $_GET['nombre'];

// Verificar si alguna de las dos variables de sesión existe
if (isset($_SESSION['operador']) || isset($_SESSION['usuario'])) {
    // Obtener el usuario de la variable de sesión que exista
    if (isset($_SESSION['operador'])) {
       $usuario = $_SESSION['operador'];
       $query = "SELECT * FROM operadores WHERE rut = '$usuario'";
         $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre']. " " .$row['apellidos'];
    } else {
       $usuario = $_SESSION['usuario'];
    }
} else {
    header("Location: ../ajax/login.php");
    exit();
}
/*Buscar datos de operador*/
$buscar = mysqli_query($conn, "SELECT * FROM insp_eva WHERE rut = '$usuario'");
while($ver = mysqli_fetch_array($buscar )){
    $id_oper = $ver['id'];
    $Rut = $ver['rut'];
    $Nombre = $ver['name'];
    $Email = $ver['correo'];
    $Telefono = $ver['telefono'];
    $Direccion = $ver['direccion'];
    $comuna = $ver['comuna'];
    $region = $ver['region'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>

</head>
<body background="white">
    folio ot, fecha, nombre, equipo, contacto de la ot, empresa, NOTA: AGREGAR NOTIFICACIONES DE OT,
    <br>
    solo para mostrar <br>
    prueba teorica imagen, licencia de conducir, cv
    <br>
    informe practico (cierre de la ot) 3 fotos de evidencia

    <br>
    <hr>
    en servicios debe tener <br>
    input de fechas para ver periodo, codigo ot, fecha cierre del informe, equipo, resultado, valor de los servicios<br>
    check que aceptacion de los servicios<br>
    subir boleta o factura de los servicios<br>

</body>
</html>