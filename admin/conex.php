<?php



$servername = "localhost";

$username = "u992209295_operamaq";

$password = "KsPa3hjRUSVafdc#";

$dbname = "u992209295_operamaq";



// Establece la conexión con la base de datos

$conn = mysqli_connect($servername, $username, $password, $dbname);



// Verifica si la conexión fue exitosa

if (!$conn) {

    die("Conexión fallida: " . mysqli_connect_error());

}

mysqli_set_charset($conn, "utf8"); // Establece el conjunto de caracteres a utf8

?>