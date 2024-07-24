<?php
// Credenciales de la base de datos
$hostname = "localhost"; // Cambia a la dirección del servidor si es diferente
$username = "root"; // Reemplaza con tu nombre de usuario de la base de datos
$password = ""; // Reemplaza con tu contraseña de la base de datos
$database = "juanproleo"; // Reemplaza con el nombre de tu base de datos

// Crear una conexión a la base de datos
$mysqli = new mysqli($hostname, $username, $password, $database);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error en la conexión a la base de datos: " . $mysqli->connect_error);
}

// Si llegas a este punto, la conexión se ha establecido con éxito
echo "Conexión exitosa a la base de datos 'juanproleo'";

// Si has terminado de usar la conexión, asegúrate de cerrarla cuando ya no la necesites.
$mysqli->close();
?>
